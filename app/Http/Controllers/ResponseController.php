<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Cloud\Firestore\FirestoreClient;

class ResponseController extends Controller
{
    public function index()
    {
        // Resolve Firestore instance
        $firestore = new FirestoreClient([
            'keyFilePath' => __DIR__ . '/very-vali-firebase-adminsdk-ly9ce-45e875d3bd.json'
        ]);

        // Reference to the responses collection
        $responsesCollection = $firestore->collection('responses');

        // Get all responses
        $responses = $responsesCollection->documents();

        // Array to hold proposal data with related recipients, individuals, and surveys
        $responseData = [];

        // Iterate through each proposal document
        foreach ($responses as $response) {
            // Retrieve proposal ID
            $responseId = $response->id();

            $responseArray = $response->data();

            // Retrieve idRecipient, idIndividual, and idSurvey from the proposal
            $idRecipient = $responseArray['idRecipient'];

            // Get recipient data based on idRecipient
            $recipientData = $this->getDataById('recipients', $idRecipient, $firestore);

            // Combine proposal data with related recipient, individual, and survey data
            $responseData[] = [
                'id' => $responseId, // Add proposal ID to the data
                'response' => $responseArray,
                'recipient' => $recipientData,
            ];
        }

        // Pass the proposal data to the view
        return view('pages.response.index', compact('responseData'));
    }

    // public function detail($responseId)
    // {
    //     // Resolve Firestore instance
    //     $firestore = new FirestoreClient([
    //         'keyFilePath' => __DIR__ . '/very-vali-firebase-adminsdk-ly9ce-45e875d3bd.json'
    //     ]);

    //     // Mendapatkan dokumen proposal berdasarkan ID proposal
    //     $responseDocument = $firestore->collection('responses')->document($responseId)->snapshot();

    //     // Jika proposal tidak ditemukan
    //     if (!$responseDocument->exists()) {
    //         abort(404);
    //     }

    //     // Mendapatkan data proposal
    //     $responseData = $responseDocument->data();

    //     // Mendapatkan data penerima berdasarkan idRecipient
    //     $recipientData = $this->getDataById('recipients', $responseData['idRecipient'], $firestore);
    //     // dd($responseData, $recipientData, $individualData, $surveyData);

    //     // Memasukkan data proposal, penerima, individu, dan survei ke dalam view detail
    //     return view('pages.response.detail', compact('responseData', 'recipientData'));
    // }

    private function getDataById($collectionName, $documentId, $firestore)
    {
        // Reference to the specified collection
        $collection = $firestore->collection($collectionName);

        // Get the document based on the document ID
        $document = $collection->document($documentId)->snapshot();

        // Return the document data
        return $document->data();
    }
}
