@extends('blank')

@section('page-title', 'Ajout taches');
@section('page-date_debut', 'Gestion de taches');

@section('main-content')

<div class="br-pagebody">
    <div class="br-section-wrapper">
      

      <form action="{{ route('taches.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-4">
                <input class="form-control @error('titre') is-invalid @enderror"  name="titre" placeholder="Entrez le titre de la tache" type="text" value="{{ old('titre') }}">
                @error('titre')
                    <div class="invalid-feedback">
                        {{ $errors->first('titre') }}
                    </div>    
                @enderror
                
            </div><!-- col -->
            <div class="col-lg-4">
                <select name="personnel" id="" class="form-control @error('personnel') is-invalid @enderror">
                    <option value="">Personnel</option>
                    @foreach ($personnel as $personnel)
                        <option value="{{ $personnel->id }}" {{ (old("personnel") == $personnel->id ? "selected":"") }}>{{ $personnel->nom }}</option>
                    @endforeach
                </select>
                @error('personnel')
                    <div class="invalid-feedback">
                        {{ $errors->first('personnel') }}
                    </div>    
                @enderror
            </div><!-- col -->
        </div><!-- row -->
        <div class="row">
            <div class="col-lg-4">
                <input class="form-control @error('date_debut') is-invalid @enderror" name="date_debut" placeholder="Entrez la date de début" type="text" value="{{ old('date_debut') }}">
            
                @error('date_debut')
                    <div class="invalid-feedback">
                        {{ $errors->first('date_debut') }}
                    </div>    
                @enderror
    
            </div><!-- col -->
            <div class="col-lg-4">
                <input class="form-control @error('date_fin') is-invalid @enderror" name="date_fin" placeholder="Entrez la date de fin" type="text" value="{{ old('date_fin') }}">
            
                @error('date_fin')
                    <div class="invalid-feedback">
                        {{ $errors->first('date_fin') }}
                    </div>    
                @enderror
    
            </div><!-- col -->

        </div><!-- row -->
        <div>
            <label for="description"></label>
            <textarea name="description" id="description" cols="30" rows="10" placeholder="Entrez la description" class="form-control @error('description') is-invalid @enderror" >{{ old('description') }}</textarea>
            @error('description')
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>    
                @enderror
        </div>
        <div class="row mt-2 mx-auto">
            <button type="submit" class="btn btn-success">Créer une tache</button>
        </div>
     </form>
    </div>
</div>

@endsection