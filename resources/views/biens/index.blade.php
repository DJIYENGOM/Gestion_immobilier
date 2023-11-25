@extends('layout.master')
@section('contenue')
<h1>Biens</h1>
<a href="/biens/create" class="btn btn-primary my-3">Nouvel bien</a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Catégories</th>
            <th scope="col">Adresse</th>
            <th scope="col">Description</th>
            <th scope="col">Status</th>
            <th scope="col">Image</th>
            <th scope="col">Dimension Bien</th>
            <th scope="col">Nombre chambre</th>
            {{-- <th scope="col">Nombre de toillette</th>
            <th scope="col">Balcon</th> --}}
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($biens as $bien)
            <tr>
                <th scope="row">{{$bien->id}}</th>
                <td>{{$bien->nom}}</td>
                <td scope="col">{{$bien->categorie}}</td>
                <td>{{$bien->adresse}} </td>
                <td>{{$bien->description}}</td>
                <td>{{$bien->status}}</td>
                <td>
                  <img src="{{ asset("storage/". $bien->image_biens) }}" alt="" style="max-width: 50px">
                </td>
                <td>{{$bien->surface}}</td>
                <td>{{$bien->nombre_chambre}}</td>
                <td>
                  <a href="/biens/{{$bien->id}}" class="btn btn-secondary">voir plus</a>

                </td>
            </tr>
        @endforeach
        </tbody>
      </table>
@endsection