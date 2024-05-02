<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Cloud\Firestore\FirestoreClient;

class RecipientController extends Controller
{
    public function index (){
        // Resolve Firestore instance
        $firestore = new FirestoreClient([
            'keyFilePath' => __DIR__ . '/very-vali-firebase-adminsdk-ly9ce-45e875d3bd.json'
        ]);

        // Reference to the recipients collection
        $collection = $firestore->collection('recipients');

        // Get all documents from the recipients collection
        $documents = $collection->documents();

        $recipients = [];
        foreach ($documents as $document) {
            // Convert Firestore document to array
            $recipients[] = $document->data();
        }

        // Pass the recipients data to the view
        return view('pages.recipient.index', compact('recipients'));
    }
}
