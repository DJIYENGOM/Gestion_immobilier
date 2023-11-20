@extends('layout.master')
@section('contenue')
    <div class="container">
        <div class="row">
            @foreach($biens as $bien)
                <div class="col-12 col-md-3 mt-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">{{$bien->nom}}</h5>
                        </div>
                       
                                <img src="{{asset('storage/'.$bien->image)}}" alt="" width="100%" height="100%">
                       
                        <div class="card-body">
                            <h5 class="card-title">{{$bien->description}}</h5>
                            <h5 class="card-title">{{$bien->status}}</h5>
                            <a href="/modifierbien/{{$bien->id}}" class="btn btn-primary">Modifier</a>
                            <a href="/supprimerbien/{{$bien->id }}" class="btn btn-danger">Supprimer</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
