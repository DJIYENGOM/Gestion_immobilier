<!-- resources/views/commentaires/index.blade.php -->

@extends('layout.master') <!-- Assurez-vous d'adapter le nom du layout en fonction de votre application -->

@section('contenue')
<div class="container">
    <h1>Liste des Commentaires</h1>

    <a href="/commentaires" class="btn btn-primary">Nouveau Commentaire</a>

    @foreach ($commentaires as $commentaire)
        <div class="card my-2">
            <div class="card-body">
                <p><strong>Utilisateur:</strong> {{ $commentaire->utilisateur->name }} ({{ $commentaire->utilisateur->email }})</p>
                <p><strong>Bien:</strong> {{ $commentaire->bien->nom }} ({{ $commentaire->bien->categorie }})</p>
                <p><strong>Contenu:</strong> {{ $commentaire->contenue }}</p>
                <p><strong>Date de publication:</strong> {{ $commentaire->date_publication }}</p>

                <!-- Ajoutez d'autres informations du commentaire selon vos besoins -->

                <a href="" class="btn btn-info">Voir Commentaire</a>
            </div>
        </div>
    @endforeach
</div>
@endsection
