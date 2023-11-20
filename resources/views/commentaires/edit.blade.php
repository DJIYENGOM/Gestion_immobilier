@extends('layout.master')

@section('contenue')
    <div class="container">
        <h1>Modifier le Commentaire</h1>

        <form action="{{ route('commentaires.update', ['commentaire' => $commentaire->id]) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label for="bien_id" class="form-label">Bien</label>
                <select name="bien_id" id="bien_id" class="form-control">
                    @foreach ($biens as $bien)
                        <option value="{{ $bien->id }}" {{ $bien->id == $commentaire->bien_id ? 'selected' : '' }}>
                            {{ $bien->nom }} ({{ $bien->categorie }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="contenue" class="form-label">Contenu du Commentaire</label>
                <textarea name="contenue" id="contenue" class="form-control" rows="5">{{ $commentaire->contenue }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Enregistrer les Modifications</button>
        </form>
    </div>
@endsection
