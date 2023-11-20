@extends('layout.master')
@section('contenue')
    <div class="container">
        <div class="card">
            <div class="col-md-6 offset-3 mt-5">
                <h5 class="card-header text-center bg-primary text-white">AJOUT BIEN</h5>
                <div class="card-body">

                    
                    <form method="post" action="/AjoutBien" enctype="multipart/form-data" >
                        @csrf

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
                    <label for="photo">
                        Ajoutez une photo <br /></label>
                    <input type="file" id="photo" name="image" />
                </div>

                        <div class="form-group">
                            <label for="nomDescrition">Description</label>
                            <input type="text" class="form-control" id="nomDescrition"
                                placeholder="Ajouter une description" name="description">
                        </div>

                        <div class="form-group">
                            <label for="nomAdresse">Adresse</label>
                            <input type="text" class="form-control" id="nomAdresse" placeholder="Enter une Adresse"
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
                        <input type="date" class="form-control" id="" placeholder="Enter la date"
                            name="date">
                    </div>

                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">                   

                     {{-- <button type="submit" class="btn btn-primary offset-4 mt-2">Ajouter</button> --}}

                     <input type="submit" name="Register" value="Ajouter " class="form-control form-control-user" id="Register">

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
