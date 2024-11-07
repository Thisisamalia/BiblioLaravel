@extends('components.layout') <!-- direction de mon fichier layout ou les repetitions des pages sont -->

@section('title', 'addbook')

@section('content')

<form action="/contact/submit" method="POST" class="contact-form">
    @csrf<!-- eviter erreur 419-->
    <label for="name">Nom :</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Email :</label>
    <input type="email" id="email" name="email" required>

    <label for="subject">Sujet :</label>
    <input type="text" id="subject" name="subject" required>

    <label for="message">Message :</label>
    <textarea id="message" name="message" required></textarea>

    <button type="submit" class="btn-submit">Envoyer</button>
</form>


<div class="biblio-info">
    <h3>Informations sur la bibliothèque</h3>
    <p><strong>La Petite Caverne</strong></p>
    <p><strong>Téléphone :</strong> (514) 389-5921</p>
    <p><strong>Adresse :</strong> 9155 Rue St-Hubert, Montréal, QC H2M 1Y8</p>
</div>

</div>
@endsection