@extends('layout.master')
@section('contenue')
<h1>Editer le biens </h1>
<form action="/biens/{{$bien->id}}" method="POST">
    @method('PATCH')
    @include('includes.forms')
    <button type="submit" class="btn btn-primary">Sauvegarder les informations</button>
</form>
@endsection