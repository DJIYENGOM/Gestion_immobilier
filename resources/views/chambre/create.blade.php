<!-- chambres.create.blade.php -->
@extends('layout.master')
@section('contenue')
     <h1>Ajouter une chambre au bien</h1>
    <form action="/chambre/" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- <input type="hidden" name="bien_id" value="{ $bien->id }}"> --}}
        <div class="form-group row">
            <div class="col-md-12">
                <input type="number" class="form-control @error('dimensions_chambres') is-invalid @enderror"
                    name="dimensions_chambres" placeholder="Dimension de la chambre.."
                    value="{{ old('dimensions_chambres') }}">
                @error('dimensions_chambres')
                    <div class="invalid-feedback">
                        {{ $errors->first('dimensions_chambres') }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-12">
                <input type="file" class="form-control @error('image_chambres') is-invalid @enderror"
                    name="image_chambres[]" placeholder="Image de la chambre.." multiple>
                @error('image_chambres')
                    <div class="invalid-feedback">
                        {{ $errors->first('image_chambres') }}
                    </div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter une chambre</button>
    </form>
@endsection
