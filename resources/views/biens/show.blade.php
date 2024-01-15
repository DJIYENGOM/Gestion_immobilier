@extends('layout.master')
@section('contenue')
<h1>Details du biens</h1>
        
<img src="{{ asset("storage/". $bien->image_biens) }}"  style=" width: 100%">

    <p><strong>Nom  : </strong>{{$bien->nom}}</p>
    <p><strong>Adresse  : </strong>{{$bien->adresse}}</p> 
    <p><strong>Dimension  : </strong>{{$bien->surface}} m2</p>
    <p><strong>Nombre de Chambre: </strong>{{$bien->nombre_chambre}}</p>
    <p><strong>Categorie : </strong>{{$bien->categorie}}</p>
    <p><strong>Balcon  : </strong>{{$bien->balcons}}</p>
    <p><strong>Espace vert  : </strong>{{$bien->espace_vert }}</p>
    <p><strong>Toillettes : </strong> {{$bien->toillette  }}</p>
    <p><strong>Status : </strong> {{$bien->status}}</p>

    <h2>Chambres</h2>
    @foreach ($bien->imagechambres as $chambre)
        <p>
            Dimension de la chambre : {{ $chambre->dimensions_chambres }}
        </p>
        @foreach ($chambre->images as $image)
            <img src="{{ asset('storage/' . $image->image_path) }}" alt="Chambre Image" style="max-width: 200px">
        @endforeach
    @endforeach
    <a href="/biens/{{$bien->id}}/edit" class="btn btn-secondary my-3">Modifier</a>
    <form action="/biens/{{$bien->id}}" method="POST" style="display: inline">
        @csrf   
        @method('DELETE')
        <button class="btn btn-danger">Supprimer</button>
    </form>
    <a href="/chambre/create" class="btn btn-warning my-3">Ajouter Chambre</a>

@endsection