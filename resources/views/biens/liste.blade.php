@extends('layout.master')
@section('contenue')
    <div class="container">
        <div class="row">
            @foreach($biens as $bien)
                <div class="col-12 col-md-3 mt-4">
                    <div class="card">
                        <div class="card-header">
                            <div class=" d-flex justify-content-between">
                            <h5 class="card-title">{{$bien->nom}}</h5>
                            <span class="card-title"> {{$bien->adresse}}</span>
                            </div>
                        </div>
                          <img src="{{asset('storage/'.$bien->image)}}" alt="" width="242" height="100">
                       
                        <div class="card-body">
                            <div class=" d-flex justify-content-between">
                            <h5 class="card-title">{{$bien->categorie}} </h5>
                            <span class="card-title"> {{$bien->status}}</span>
                            </div>
                            <a href="/modifierbien/{{$bien->id}}" class="btn btn-primary">Modifier</a>
                            <a href="/biensCommentaires/{{$bien->id}}" class="btn btn-secondary">✉</a>
                            <a href="/supprimerbien/{{$bien->id }}" class="btn btn-danger">🗑</a>
                        </div>

                    </div>
                </div>

            @endforeach
        </div>
    </div>
@endsection
