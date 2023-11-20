@extends('layout.master')
@section('contenue')
    <div class="container">
        <h1>Commentaire</h1>

        <div class="card my-2">
            <div class="card-body">
                <p><strong>Utilisateur:</strong> {{ $commentaire->utilisateur->name }} ({{ $commentaire->utilisateur->email }})</p>
                <p><strong>Bien:</strong> {{ $commentaire->bien->nom }} ({{ $commentaire->bien->categorie }})</p>
                <p><strong>Contenu:</strong> {{ $commentaire->contenue }}</p>
                <p><strong>Date de publication:</strong> {{ $commentaire->date_publication }}</p>
                {{-- @if(auth()->user() && auth()->user()->role === 'admin') --}}
                <form action="/clients/{{$commentaire->id}}" method="POST" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Supprimer</button>
                </form>
                {{-- @endif  --}}
            </div>
        </div>
    </div>
@endsection
