@extends('components.layout') <!-- direction de mon fichier layout ou les repetitions des pages sont -->

@section('title', 'Homepage')

@section('content')
    

    <div class="booklist">
        @php
            use Illuminate\Support\Facades\File;

            $contents = File::get(base_path('resources/data/books.json'));
            $books = json_decode($contents, true);
        @endphp

        <!-- Implémentation dynamique de mon array de mon fichier Json du livre -->
        @foreach ($books as $book)
        <div class="container">
            <div class="book-card">
                <img src="{{ asset('images/' . $book['image']) }}" alt="{{ e($book['titre']) }} cover">
                <h2>{!! $book['titre'] !!}</h2> <!-- ajout des !! car symbole non désiré -->
                <p><strong>Auteur:</strong> {{ e($book['auteure']) }}</p>
                <p><strong>Résumé:</strong> {!! $book['description'] !!}</p>
                <p><strong>Sujet:</strong> {{ e($book['sujet']) }}</p>
                <p><strong>Prix:</strong> ${{ number_format($book['prix'], 2) }}</p>
                <p><strong>Date de création:</strong> 
                    {{ $book['date_creation'] ? \Carbon\Carbon::parse($book['date_creation'])->format('d/m/Y') : '' }} <!-- garder vide car cest nous qui lavon implemente-->
                </p>
                <p><strong>Date de modification:</strong> 
                    {{ $book['date_modification'] ? \Carbon\Carbon::parse($book['date_modification'])->format('d/m/Y') : '' }}<!-- https://stackoverflow.com/questions/33825869/date-format-differences-between-d-m-y-and-d-m-y-->
                </p>
            </div>
        </div>
    @endforeach
    
    </div>

    <button type="button" id="add-book" onclick="window.location.href='/addbook'">Ajouter un Livre</button>
    <button type="button" id="motify-book" onclick="window.location.href='/detail'">Details des livres</button>
    <button type="button" id="new-book" onclick="window.location.href='/nouveaute'">Nouveauté</button>


   
@endsection