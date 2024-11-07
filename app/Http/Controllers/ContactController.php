<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; /* on avait une erreur ici car on avait pas mis la requette */
use Illuminate\Support\Facades\File;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        // Chemin vers le fichier JSON
        $filePath = base_path('resources/data/message.json');

        // Lire les données existantes
        $currentData = [];
        if (file_exists($filePath)) {
            $currentData = json_decode(file_get_contents($filePath), true) ?? [];
        }

        // Ajouter le nouveau message
        $currentData[] = $validatedData;

        // Enregistrer les données mises à jour dans le fichier JSON
        file_put_contents($filePath, json_encode($currentData, JSON_PRETTY_PRINT));

        // Rediriger vers la page des messages avec un message de succès
        return redirect('/message')->with('success', 'Votre message a été envoyé avec succès.');
    }

    public function showMessages()
    {
        // Chemin vers le fichier JSON
        $filePath = base_path('resources/data/message.json');

        // Lire les messages existants
        $messages = [];
        if (file_exists($filePath)) {
            $messages = json_decode(file_get_contents($filePath), true) ?? [];
        }

        // Passer les messages à la vue
        return view('message', ['messages' => $messages]);
    }
}
