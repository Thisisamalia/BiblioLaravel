<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Support\Facades\File;


class Homepagecontroller extends Controller
{
    public function showHomepage()
    {
        $filePath = base_path('resources/data/books.json');
        $books = [];

        if (file_exists($filePath)) {
            $books = json_decode(file_get_contents($filePath), true) ?? [];
        }

        return view('homepage', ['books' => $books]);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $filePath = base_path('resources/data/books.json');
        $books = [];

        if (file_exists($filePath)) {
            $contents = File::get($filePath);
            $books = json_decode($contents, true) ?? [];
        }

        // Filtrer les livres par titre ou auteur
        //nous allons filtrer notre array books et nous allons comparer chaque valeur avec la valeur query et si !== false veut dire que le livre na pas ete trouve
        $filteredBooks = array_filter($books, function ($book) use ($query) {
            return stripos($book['titre'], $query) !== false || stripos($book['auteure'], $query) !== false;
        });

        // Passer les résultats filtrés à la vue
        return view('homepage', ['books' => $filteredBooks]);
    }


         
}
