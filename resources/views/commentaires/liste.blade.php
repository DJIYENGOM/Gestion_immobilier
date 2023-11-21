@extends('layout.master')
@section('contenue')

@foreach($commentaires as $commentaire)
<li class="list-group-item d-flex justify-content-between align-items-center">
    {{ $commentaire->contenue }}
    <span class="">
        {{ $commentaire->user->name }} {{ $commentaire->user->prenom }}
        @if(auth()->user()->isAdmin())
        <a href="{{ route('commentaires.supprimer', ['commentaireId' => $commentaire->id]) }}" class="btn btn-danger">Supprimer</a>
        @endif
    </span>
</li>
@endforeach


@endsection