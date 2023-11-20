@extends('layout.master')
@section('contenue')
<div class="container">
        <h2>Ajouter un commentaire</h2>
        <form action="{{ route('commentaires.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="contenu">Contenu du commentaire</label>
                <textarea class="form-control" id="contenu" name="contenu" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter le commentaire</button>
        </form>
    </div>

@endsection