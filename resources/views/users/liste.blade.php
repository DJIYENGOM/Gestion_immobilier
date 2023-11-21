@extends('layout.master')
@section('contenue')
<h1>Liste des utilisateurs</h1>

<ul>
    @foreach ($users as $user)
    <li>{{ $user->name }} - {{ $user->email }}</li>
    @endforeach
</ul>
@endsection