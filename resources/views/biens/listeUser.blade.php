@extends('layoutUser.master')
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
                          <img src="{{asset('storage/'.$bien->image)}}" alt="" width="253" height="100">
                       
                        <div class="card-body">
                            <div class=" d-flex justify-content-between">
                            <h5 class="card-title">{{$bien->categorie}} </h5>
                            <span class="card-title"> {{$bien->status}}</span>
                            </div>
                            <h5 class="card-title">{{$bien->description}}</h5>

                            <h5 class="card-title">{{$bien->created_at}}</h5>
                            <a href="/commentaires/ajout/{{$bien->id}}" class="btn btn-primary">Voir Plus</a>
                        </div>

                    </div>
                </div>

            @endforeach
        </div>
    </div>
@endsection
