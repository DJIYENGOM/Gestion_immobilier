@csrf
<div class="form-group row">
    <div class="col-md-12">
        <input type="text" class="form-control @error('nom') is-invalid @enderror"  name="nom" placeholder="Nom du Biens...." value="{{ old('nom') ?? $bien->nom}}">
        @error('nom')
        <div class="invalid-feedback">
                {{$errors->first('nom')}}
        </div>
        @enderror
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12">
        <input type="text" class="form-control  @error('adresse') is-invalid @enderror" name="adresse" placeholder="Adresse...." value="{{ old('adresse') ?? $bien->adresse}}">
        @error('adresse')
        <div class="invalid-feedback">
                {{$errors->first('adresse')}}
        </div>
        @enderror
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12">
        <input type="number" class="form-control  @error('nombre_chambre') is-invalid @enderror" name="nombre_chambre" placeholder="Nombre de chambre.." value="{{ old('adresse') ?? $bien->nombre_chambre}}">
        @error('nombre_chambre')
        <div class="invalid-feedback">
                {{$errors->first('nombre_chambre')}}
        </div>
        @enderror
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12">
        <input type="number" class="form-control  @error('surface') is-invalid @enderror" name="surface" placeholder="Dimension du bien.." value="{{ old('surface') ?? $bien->surface}}">
        @error('surface')
        <div class="invalid-feedback">
                {{$errors->first('surface')}}
        </div>
        @enderror
    </div>
</div>
<div class="form-group row justify-content"> 
    <div class="col-md-6">
        <p>
            Status du biens
            <select class="form-control form-select-sm  @error('status') is-invalid @enderror" placeholder="" name="status" aria-label=".form-select-sm example">
                {{-- <option value="1">Actif</option>
                <option value="0">Inactif</option> --}}
                @foreach ($bien->getStatusOptions() as $key => $value )
                <option value="{{$key}}">{{$value}}</option>
                @endforeach
            </select>
        </p>
        @error('status')
            <div class="invalid-feedback">
                    {{$errors->first('status')}}
            </div>
        @enderror
    </div>
    <div class="col-md-6"> 
        <p>
            Catégorie du bien : 
            <select class="form-control form-select-sm  @error('categorie') is-invalid @enderror" name="categorie" aria-label=".form-control-sm example">
                {{-- <option value="1">Actif</option>
                <option value="0">Inactif</option> --}}
                @foreach ($bien->getCategorieOptions() as $key => $value )
                <option value="{{$key}}">{{$value}}</option>
                @endforeach
            </select>
        </p>
       
        @error('categorie')
            <div class="invalid-feedback">
                    {{$errors->first('categorie')}}
            </div>
        @enderror
    </div> 
</div>
<div class="form-group row justify-content"> 
    <div class="col-md-6">
        <p>
            Toillettes des biens : 
            <select class="form-control form-select-sm  @error('toillette') is-invalid @enderror" name="toillette" aria-label=".form-select-sm example">
                {{-- <option value="1">Actif</option>
                <option value="0">Inactif</option> --}}
                @foreach ($bien->getToiletteOptions() as $key => $value )
                <option value="{{$key}}">{{$value}}</option>
                @endforeach
            </select>
        </p>
        
        @error('toillette')
            <div class="invalid-feedback">
                    {{$errors->first('toillette')}}
            </div>  
        @enderror
    </div>
  
    <div class="col-md-6">
        <p>
            Balcons du biens:
            <select class="form-control form-select-sm  @error('balcons') is-invalid @enderror" name="balcons" aria-label=".form-select-sm example">
                {{-- <option value="1">Actif</option>
                <option value="0">Inactif</option> --}}
                @foreach ($bien->getBalconOptions() as $key => $value )
                <option value="{{$key}}">{{$value}}</option>
                @endforeach
            </select>
        </p> 
        @error('balcons')
            <div class="invalid-feedback">
                    {{$errors->first('balcons')}}
            </div>  
        @enderror
    </div>
</div>
<div class="form-group justify-content"> 
    <p>
        Espace vert : 
        <select class="form-control form-select-sm  @error('espace_vert') is-invalid @enderror" name="espace_vert" aria-label=".form-select-sm example">
            {{-- <option value="1">Actif</option>
            <option value="0">Inactif</option> --}}
            @foreach ($bien->getEspaceVertOptions() as $key => $value )
            <option value="{{$key}}">{{$value}}</option>
            @endforeach
        </select>
    </p>
   
    @error('espace_vert')
        <div class="invalid-feedback">
                {{$errors->first('espace_vert')}}
        </div>
    @enderror
</div>  
<div class="form-group row">
    <div class="col-md-12">
        <input type="file" class="form-control  @error('image_biens') is-invalid @enderror" name="image_biens" placeholder="Image principale du bien.." value="{{ old('image_biens') ?? $bien->image_biens}}">
        @error('image_biens')
        <div class="invalid-feedback">
                {{$errors->first('image_biens')}}
        </div>
        @enderror
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12">
        <textarea class="form-control   @error('description') is-invalid @enderror" cols="30" rows="10" placeholder="Description du biens" name="description">
            {{ old('description') }}
        </textarea>
        @error('description')
        <div class="invalid-feedback">
                {{$errors->first('description')}}
        </div>
        @enderror
    </div>
</div>
<input type="hidden" name="user_id" value="{{ auth()->user()->id }}">