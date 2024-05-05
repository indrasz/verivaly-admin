<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Google\Cloud\Firestore\FirestoreClient;
use Kreait\Firebase\Contract\Firestore;
use Kreait\Firebase\ServiceAccount;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Google\Auth\Credentials\ServiceAccountCredentials;

class DashboardController extends Controller
{
    public function index()
    {
        $firestore = new FirestoreClient([
            'keyFilePath' => __DIR__ . '/very-vali-firebase-adminsdk-ly9ce-45e875d3bd.json'
        ]);

        // Reference to the proposals collection
        $proposalsCollection = $firestore->collection('proposals');
        $responsesCollection = $firestore->collection('responses');
        $recipientsCollection = $firestore->collection('recipients');

        $totalProposals = $proposalsCollection->documents()->size();
        $totalResponses = $responsesCollection->documents()->size();
        $totalRecipients = $recipientsCollection->documents()->size();

        $proposalData = $this->getDataPerDay('proposals', $firestore);
        $responseData = $this->getDataPerDay('responses', $firestore);

        return view('pages.index',[
            'totalProposals' => $totalProposals,
            'totalResponses' => $totalResponses,
            'totalRecipients' => $totalRecipients,
            'proposalData' => $proposalData,
            'responseData' => $responseData
        ]);
    }

    private function getDataPerDay($collectionName, $firestore)
    {
        // Ambil referensi ke koleksi
        $collection = $firestore->collection($collectionName);

        // Ambil data proposal/response
        $documents = $collection->documents();

        // Array untuk menyimpan jumlah proposal/response per hari
        $dataPerDay = [];

        // Iterasi setiap dokumen
        foreach ($documents as $document) {
            // Ambil tanggal dokumen
            $timestamp = $document->createTime()->get()->format('Y-m-d');

            // Tambahkan jumlah proposal/response ke data per hari
            if (isset($dataPerDay[$timestamp])) {
                $dataPerDay[$timestamp]++;
            } else {
                $dataPerDay[$timestamp] = 1;
            }
        }

        return $dataPerDay;
    }

    public function convert(Request $request)
    {

        $file = $request->file('json_file');

        if ($file->getClientOriginalExtension() == 'json') {
            $jsonData = json_decode(file_get_contents($file->getPathname()), true);

            // dd($jsonData);
            if ($jsonData === null) {
                return "Terdapat kesalahan dalam membaca file JSON.";
            }

            // Membersihkan data dari kolom dengan nama "null" dan spasi di akhir nama kolom
            foreach ($jsonData['data'] as &$row) {
                unset($row["null"]); // Hapus kolom dengan nama "null"
                foreach ($row as $key => $value) {
                    $row[trim($key)] = $value; // Hapus spasi di akhir nama kolom
                }
            }
            // dd($jsonResult, $jsonData);
            try {
                // Resolve Firebase instance from the container

                $factory = (new Factory())
                    ->withServiceAccount(__DIR__ . '/very-vali-firebase-adminsdk-ly9ce-45e875d3bd.json')
                    ->withDatabaseUri('https://very-vali-default-rtdb.firebaseio.com');


                $firestore = $factory->createFirestore();

                foreach ($jsonData['data'] as &$data) {
                    // Remove empty keys from each data object
                    $data = array_filter($data, function ($value, $key) {
                        return $key !== '';
                    }, ARRAY_FILTER_USE_BOTH);

                    // Add data to Firestore
                    $firestore->database()->collection('recipients')->add($data);
                }

                return response()->json(['message' => 'Data berhasil di-push ke Firestore'], 200);
            } catch (\Exception $e) {
                return "Terjadi kesalahan saat mengakses Firestore: " . $e->getMessage();
            }
        } else {
            return "Mohon unggah file JSON saja.";
        }
    }
}
