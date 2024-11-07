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
        return redirect('/message')->with('success', 'Merci pour votre message.');
    }

    public function showMessages()
    {
        // Chemin vers le fichier JSON
        $filePath = base_path('resources/data/message.json');

        // Lire les messages existants
        $messages = []; // initialiser le array message comme vide
        if (file_exists($filePath)) { // verification du chemin du message.json
            $messages = json_decode(file_get_contents($filePath), true) ?? []; // si le fichier est invalide celui va donner le array de mon message.json vide. celui est comme un conditionel ternaire
        }                                                                     // valeur true fait en sorte que ca lis le fichier et le code en tableay PHP

        // Passer les messages à la vue
        return view('message', ['messages' => $messages]);
    }
}

