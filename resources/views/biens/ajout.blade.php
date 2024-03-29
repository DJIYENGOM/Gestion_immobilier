@extends('layout.master')
@section('contenue')
@if(count($errors) > 0)
    <div class="alert alert-dismissible alert-danger">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        @foreach($errors->all() as $error)
            {{ $error }}
            <strong>Oh snap!</strong> 
        @endforeach
    </div>
@endif
<div class="container">
    <div class="card">
        <div class="col-md-6 offset-3 mt-5">
            <h5 class="card-header text-center bg-primary text-white">AJOUT BIEN</h5>
            <div class="card-body">
                <form method="post" action="/AjoutBien" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="">Nom</label>
                        <select name="nom" id="">
                            <option value="studio">Studio</option>
                            <option value="duplex">Duplex</option>
                            <option value="appartement">Appartement</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Catégorie</label>
                        <select name="categorie" id="">
                            <option value="luxe">Luxe</option>
                            <option value="simple">Simple</option>
                            <option value="moyen">Moyen</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="photo">Ajoutez une photo</label>
                        <input type="file" id="photo" name="image" />
                    </div>

                    <div class="form-group">
                        <label for="nomDescription">Description</label>
                        <input type="text" class="form-control" id="nomDescription" placeholder="Ajouter une description" name="description">
                    </div>

                    <div class="form-group">
                        <label for="nomAdresse">Adresse</label>
                        <input type="text" class="form-control" id="nomAdresse" placeholder="Entrer une adresse" name="adresse">
                    </div>

                    <div class="form-group">
                        <label for="">Statut</label>
                        <select name="status" id="">
                            <option value="disponible">Disponible</option>
                            <option value="occupe">Occupé</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nombreChambres">Nombre de chambres</label>
                        <input type="number" name="nombreChambres" value="{{ old('nombreChambres') }}" required>
                    </div>

                    <!-- Ajout des champs pour les chambres et les images -->
                    <div class="chambres-details">
                        @for ($i = 1; $i <= old('nombreChambres', 1); $i++)
                            <div class="chambre">
                                <label for="chambres[{{ $i }}][dimensions_m2]">Dimensions (en m2) de la chambre {{ $i }}</label>
                                <input type="number" name="chambres[{{ $i }}][dimensions_m2]" value="{{ old('chambres.'.$i.'.dimensions_m2') }}" required>

                                <!-- Ajoutez d'autres champs pour les détails de la chambre -->

                                <label for="chambres_images[{{ $i }}][]">Images de la chambre {{ $i }}</label>
                                <input type="file" name="chambres_images[{{ $i }}][]" multiple>
                            </div>
                        @endfor
                    </div>

                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="submit" name="Register" value="Ajouter" class="form-control form-control-user" id="Register">

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
