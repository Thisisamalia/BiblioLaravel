@extends('components.layout') <!-- direction de mon fichier layout ou les repetitions des pages sont -->

@section('title', 'Messages')

@section('content')
    <h2 id="msg">Messages </h2>
    <div class="message-container">
    @foreach ($messages as $message)
        <div class="message-card">
            <p><strong>Nom :</strong> {{ e($message['name']) }}</p>
            <p><strong>Email :</strong> {{ e($message['email']) }}</p>
            <p><strong>Sujet :</strong> {{ e($message['subject']) }}</p>
            <p><strong>Message :</strong> {{ e($message['message']) }}</p>
        </div>
    @endforeach
    <div>
@endsection