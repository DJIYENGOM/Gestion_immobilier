<!-- resources/views/commentaires/index.blade.php -->

@extends('layouts.app') <!-- Assurez-vous d'adapter le nom du layout en fonction de votre application -->

@section('content')
    <div class="container">
        <h1>Liste des Commentaires</h1>

        @foreach ($commentaires as $commentaire)
            <div class="card">
                <div class="card-body">
                    <p>{{ $commentaire->contenue }}</p>
                    <p>Date de publication: {{ $commentaire->date_publication }}</p>
                    <!-- Ajoutez d'autres informations du commentaire selon vos besoins -->
                </div>
            </div>
        @endforeach
    </div>
@endsection
