
@extends('layoutUser.master')

@section('contenue')
    <h2>Modifier commantaire</h2>
    <form action="/comments/edit/{{$commentaire->id}}" method="post">
        @csrf
        <div class="form-group">
            <label for="contenue">Contenu du commentaire</label>
            <textarea class="form-control" id="contenue" name="contenue" rows="4" required>{{ $commentaire->contenue }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
@endsection
