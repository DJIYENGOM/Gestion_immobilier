@extends('layout.master')
@section('contenue')
<div class="container">
    <div class="row">
        @foreach($biens as $bien)
        <div class="col-12 col-md-3 mt-4">
            <div class="card">
                <div class="card-header">
                    Bien
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" class="d-block user-select-none" width="100%" height="200" aria-label="Placeholder: Image cap" focusable="false" role="img" preserveAspectRatio="xMidYMid slice" viewBox="0 0 318 180" style="font-size:1.125rem;text-anchor:middle">
                    <rect width="100%" height="100%" fill="#868e96"></rect>
                    <text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text>
                </svg>
                <div class="card-body">
                    <h5 class="card-title">{{$bien->nom}}</h5>
                    <h5 class="card-title">{{$bien->description}}</h5>
                    <h5 class="card-title">{{$bien->status}}</h5>
                    <a href="#" class="btn btn-primary">Commenter</a>
                    <a href="#" class="btn btn-primary">Voir Plus</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection