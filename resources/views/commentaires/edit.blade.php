@extends('layout.master')
@section('contenue')
<div class="container">
    <h1>Modifier le Commentaire</h1>

    <form action="{{ route('commentaires.update', $commentaire->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="contenue">Contenu du Commentaire</label>
            <textarea name="contenue" id="contenue" class="form-control" rows="5" required>{{ $commentaire->contenue }}</textarea>
        </div>
        <!-- Ajoutez d'autres champs de formulaire selon vos besoins -->
        <button type="submit" class="btn btn-primary">Mettre à jour Commentaire</button>
    </form>
</div>
@endsection