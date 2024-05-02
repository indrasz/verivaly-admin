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
        return view('pages.index');
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
