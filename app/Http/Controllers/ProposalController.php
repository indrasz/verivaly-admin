<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Cloud\Firestore\FirestoreClient;

class ProposalController extends Controller
{
    public function index()
    {
        // Resolve Firestore instance
        $firestore = new FirestoreClient([
            'keyFilePath' => __DIR__ . '/very-vali-firebase-adminsdk-ly9ce-45e875d3bd.json'
        ]);

        // Reference to the proposals collection
        $proposalsCollection = $firestore->collection('proposals');

        // Get all proposals
        $proposals = $proposalsCollection->documents();

        // Array to hold proposal data with related recipients, individuals, and surveys
        $proposalData = [];

        // Iterate through each proposal document
        foreach ($proposals as $proposal) {
            // Retrieve proposal ID
            $proposalId = $proposal->id();

            $proposalArray = $proposal->data();

            // Retrieve idRecipient, idIndividual, and idSurvey from the proposal
            $idRecipient = $proposalArray['idRecipient'];
            $idIndividual = $proposalArray['idIndividual'];
            $idSurvey = $proposalArray['idSurvey'];

            // Get recipient data based on idRecipient
            $recipientData = $this->getDataById('recipients', $idRecipient, $firestore);

            // Get individual data based on idIndividual
            $individualData = $this->getDataById('individuals', $idIndividual, $firestore);

            // Get survey data based on idSurvey
            $surveyData = $this->getDataById('surveys', $idSurvey, $firestore);

            // Combine proposal data with related recipient, individual, and survey data
            $proposalData[] = [
                'id' => $proposalId, // Add proposal ID to the data
                'proposal' => $proposalArray,
                'recipient' => $recipientData,
                'individual' => $individualData,
                'survey' => $surveyData
            ];
        }

        // Pass the proposal data to the view
        return view('pages.proposal.index', compact('proposalData'));
    }

    public function detail($proposalId)
    {
        // Resolve Firestore instance
        $firestore = new FirestoreClient([
            'keyFilePath' => __DIR__ . '/very-vali-firebase-adminsdk-ly9ce-45e875d3bd.json'
        ]);

        // Mendapatkan dokumen proposal berdasarkan ID proposal
        $proposalDocument = $firestore->collection('proposals')->document($proposalId)->snapshot();

        // Jika proposal tidak ditemukan
        if (!$proposalDocument->exists()) {
            abort(404);
        }

        // Mendapatkan data proposal
        $proposalData = $proposalDocument->data();

        // Mendapatkan data penerima berdasarkan idRecipient
        $recipientData = $this->getDataById('recipients', $proposalData['idRecipient'], $firestore);

        // Mendapatkan data individu berdasarkan idIndividual
        $individualData = $this->getDataById('individuals', $proposalData['idIndividual'], $firestore);

        // Mendapatkan data survei berdasarkan idSurvey
        $surveyData = $this->getDataById('surveys', $proposalData['idSurvey'], $firestore);

        // dd($proposalData, $recipientData, $individualData, $surveyData);

        // Memasukkan data proposal, penerima, individu, dan survei ke dalam view detail
        return view('pages.proposal.detail', compact('proposalData', 'recipientData', 'individualData', 'surveyData'));
    }

    // Helper function to get data from a specific collection based on document ID
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
