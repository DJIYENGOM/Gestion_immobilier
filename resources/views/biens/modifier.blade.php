@extends('layout.master')
@section('contenue')
@if(count($errors)>0)
    <div class="alert alert-dismissible alert-danger">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    @foreach($errors->all() as $error)
    <strong>Oh snap!</strong> <a href="#" class="alert-link">{{$error}}.
    @endforeach
    </div>  
@endif
    <div class="container">
        <div class="card">
            <div class="col-md-6 offset-3 mt-5">
                <h5 class="card-header text-center bg-primary text-white">MODIFIER Bien</h5>
                <div class="card-body">

                    <form method="post" action="/modifierbien/traitement">
                        @csrf
                        <input type="text" name="id", style="display: none" value="{{$bien->id}}">

                         <div class="form-group" >
                            <label for="">Nom</label>
                            <select name="nom" id="" >
                                <option value="studio">Studio</option>
                                <option value="duplex">Duplex </option>
                                <option value="appartement">Appartement </option>
                            </select>
                    </div>
                    <div class="form-group" >
                        <label for="">Categorie</label>
                        <select name="categorie" id="" >
                            <option value="luxe">Luxe</option>
                            <option value="simple">Simple </option>
                            <option value="moyen">Moyen </option>
                        </select>
                </div>


                        <div class="form-group">
                            <label for="nomDescrition">Description</label>
                            <input type="text" class="form-control" id="nomDescrition"
                            value="{{$bien->description}}" name="description">
                        </div>

                        <div class="form-group">
                            <label for="nomAdresse">Adresse</label>
                            <input type="text" class="form-control" id="nomAdresse"  value="{{$bien->adresse}}"
                                name="adresse">
                        </div>

                        <div class="form-group" >
                            <label for="">Status</label>
                            <select name="status" id="" >
                                <option value="disponible">Disponible</option>
                                <option value="occuper">Occuper </option>
                            </select>
                    </div>

                    <div class="form-group">
                        <label for="">Date</label>
                        <input type="date" class="form-control" id="" value="{{$bien->date_enregistrement}}"
                            name="date">
                    </div>
                        <button type="submit" class="btn btn-primary offset-4 mt-2">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
