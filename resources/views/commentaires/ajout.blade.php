@extends('layoutUser.master')
@section('contenue')
@if(count($errors) > 0)
<div class="alert alert-dismissible alert-danger">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    @foreach($errors->all() as $error)
    {{ $error }}
    <strong>Oh snap!</strong>
    @endforeach
</div>
@endif

<div class="container  offset-2">
    <div class="card mb-4 mt-4" style=" width:80%;">
        <img src="{{asset('storage/'.$bien->image)}}" class="img-fluid rounded-start" alt="" style="height: 350px; width: 100%;">
        <div class="row">
            <div class="card-body">
                <h5 class="card-title d-flex justify-content-between align-items-center">Nom: {{$bien->nom}}
                    <span class="">Statut: {{ $bien->status}}</span>
                </h5>
                <h5 class="card-title d-flex justify-content-between align-items-center">Adresse: {{ $bien->adresse}}
                    <span class="">Catégorie: {{$bien->categorie}}</span>
                </h5>
                <h5 class="card-title d-flex justify-content-between align-items-center">Description: {{ $bien->description}}
                    <span class="">Commentaires: {{ $bien->commentaires->count() }}</span>
                </h5>
                <a href="{{'/biens/listeUser'}}" class="btn btn-info">Retour</a>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <h2>Ajouter un commentaire</h2>
    <form action="/commentaires/ajoute" method="post">
        @csrf
        <div class="form-group">
            <label for="contenue">Contenu du commentaire</label>
            <textarea class="form-control" id="contenue" name="contenue" rows="4" required></textarea>
        </div>
        <input type="hidden" name="bien_id" value="{{ $bien->id }}">
        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
        <button type="submit" class="btn btn-primary offset-4 mt-2">Soumettre</button>
    </form>
</div>
<div class="card mb-4 mt-4">
    @foreach($bien->commentaires as $commentaire)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        {{ $commentaire->user->name }} {{ $commentaire->user->prenom }}
        <span class="">{{$commentaire->contenue}} {{$commentaire->created_at}} </span>
    </li>

    @endforeach
</div>
@endsection