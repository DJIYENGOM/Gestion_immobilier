@extends('layout.master')
@section('contenue')
<div class="container">
    <h1>Nouveau Commentaire</h1>

    <form action="/commentaires" method="POST">
        @csrf
        <div class="form-group">
            <label for="contenue">Contenu du Commentaire</label>
            <textarea name="contenue" id="contenue" class="form-control" rows="5" required></textarea>
        </div>
        <!-- Ajoutez d'autres champs de formulaire selon vos besoins -->
        <button type="submit" class="btn btn-primary">Ajouter Commentaire</button>
    </form>
</div>
@endsection

    
