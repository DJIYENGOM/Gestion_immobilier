@extends('layout.master')
@section('contenue')
<h1>Créer un nouveau bien</h1>
<form action="/biens" method="POST" enctype="multipart/form-data">
    @include('includes.forms')
    <button type="submit" class="btn btn-primary">Ajouter un Bien</button>
</form>
@endsection
