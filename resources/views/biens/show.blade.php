@extends('layout.master')
@section('contenue')
<h1>Details du biens</h1>
        
<img src="{{ asset("storage/". $bien->image_biens) }}"  style=" width: 100%">

    <p><strong>Nom  : </strong>{{$bien->nom}}</p>
    <p><strong>Adresse  : </strong>{{$bien->adresse}}</p> 
    <p><strong>Dimension  : </strong>{{$bien->surface}}</p>
    <p><strong>Nombre de Chambre: </strong>{{$bien->nombre_chambre}}</p>
    <p><strong>Categorie : </strong>{{$bien->categorie}}</p>
    <p><strong>Balcon  : </strong>{{$bien->balcons}}</p>
    <p><strong>Espace vert  : </strong>{{$bien->espace_vert }}</p>
    <p><strong>Toillettes : </strong> {{$bien->toillette  }}</p>
    <p><strong>Status : </strong> {{$bien->status}}</p>
    <a href="/biens/{{$bien->id}}/edit" class="btn btn-secondary my-3">Modifier</a>
    <form action="/biens/{{$bien->id}}" method="POST" style="display: inline">
        @csrf   
        @method('DELETE')
        <button class="btn btn-danger">Supprimer</button>
    </form>
    <a href="/chambre/create" class="btn btn-warning my-3">Ajouter Chambre</a>

@endsection