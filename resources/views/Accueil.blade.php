@extends('layoutAccueil.master')
@section('contenue')
<div class="container">
    <div class="card mb-4 mt-4" style=" width:100%;">
    <img src="{{asset('images/image2.png')}}" alt="">
</div>
</div>
<div class="container">
        <div class="row">
            @foreach($biens as $bien)
                <div class="col-12 col-md-3 mt-4">
                    <div class="card">
                        <div class="card-header">
                            <div class=" d-flex justify-content-between">
                            <h5 class="card-title">Nom:</h5>
                            <span class="card-title">{{$bien->nom}}</span>
                            </div>
                        </div>
                          <img src="{{asset('storage/'.$bien->image)}}" alt="" width="253" height="100">
                       
                        <div class="card-body">
                            <div class=" d-flex justify-content-between">
                            <h5 class="card-title">Adresse:</h5>
                            <span class="card-title"> {{$bien->adresse}}</span>
                            </div>
                            <a href="/login" class="btn btn-primary">Voir Plus</a>
                        </div>

                    </div>
                </div>

            @endforeach
        </div>
    </div>
    @endsection