@extends('layout.master')

@section('contenue')
    <div class="container">
        <h1>Nouveau Commentaire</h1>

        <form action="/commentaires" method="POST">
            @csrf

            <div class="mb-3">
                <label for="bien_id" class="form-label">Bien</label>
                <select name="bien_id" id="bien_id" class="form-control">
                    @foreach ($biens as $bien)
                        <option value="{{ $bien->id }}">{{ $bien->nom }} ({{ $bien->categorie }})</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="contenue" class="form-label">Contenu du Commentaire</label>
                <textarea name="contenue" id="contenue" class="form-control" rows="5"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
@endsection
