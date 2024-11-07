@extends('components.layout')

@section('title', 'Nouveautés')

@section('content')
    <h2>Livres Nouveautés</h2>
    <div class="booklist">
        @if(is_array($books) && count($books) > 0)
            @foreach ($books as $book)
                <div class="container">
                    <div class="book-card">
                        <img src="{{ asset('images/' . $book['image']) }}" alt="{{ e($book['titre']) }} cover">
                        <h2>{{ $book['titre'] }}</h2>
                        <p><strong>Auteur:</strong> {{ e($book['auteure']) }}</p>
                        <p><strong>Résumé:</strong> {{ $book['description'] }}</p>
                        <p><strong>Sujet:</strong> {{ e($book['sujet']) }}</p>
                        <p><strong>Prix:</strong> ${{ number_format($book['prix'], 2) }}</p>
                        <p><strong>Date de création:</strong> 
                            {{ $book['date_creation'] ? \Carbon\Carbon::parse($book['date_creation'])->format('d/m/Y') : '' }}
                        </p>
                    </div>
                </div>
            @endforeach
        @else
            <p>Aucun livre trouvé.</p>
        @endif
    </div>
@endsection
