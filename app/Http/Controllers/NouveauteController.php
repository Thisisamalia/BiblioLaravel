<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class NouveauteController extends Controller
{
    public function showNouveautes()
    {
        $filePath = base_path('resources/data/books.json');
        $books = [];

        if (file_exists($filePath)) {
            $contents = File::get($filePath);
            $books = json_decode($contents, true) ?? [];
        }

        // trier les livres des dates de creation les plus recent avec le date_creation
        //https://www.php.net/manual/en/function.usort.php
        usort($books, function ($a, $b) {
            return strtotime($b['date_creation']) - strtotime($a['date_creation'] ?? '1970-01-01');
        });

        // afficher les resultats dans la vue nouveaute
        return view('nouveaute', ['books' => $books]);
    }
}
