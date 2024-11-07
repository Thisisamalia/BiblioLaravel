<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class Addcontroller extends Controller

{
    public function store(Request $request)
    {
        // Validation des champs du formulaire
        $validatedData = $request->validate([
            'title' => 'required|max:200',
            'author' => 'required|max:200',
            'year' => 'required',
            'summary' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'image'
        ]);

        // Gestion du téléchargement de l'image si présente
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $validatedData['image'] = basename($imagePath);
        }

        // Ajout des dates de création et de modification
        $validatedData['date_creation'] = now();
        $validatedData['date_modification'] = now();

        // Lecture et mise à jour du fichier JSON
        $filePath = base_path('resources/data/books.json');
        $currentData = [];

        if (file_exists($filePath)) {
            $currentData = json_decode(file_get_contents($filePath), true) ?? [];
        }

        // Pousser les nouvelles données dans le JSON
        $currentData[] = $validatedData;

       

        // Écriture des données mises à jour dans le fichier JSON
        file_put_contents($filePath, json_encode($currentData, JSON_PRETTY_PRINT));

        // Redirection vers la page 'homepage'
        return redirect('/homepage')->with('success', 'Livre ajouté avec succès !');
    }
}
