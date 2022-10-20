@extends('blank')

@section('page-title', 'Modifier un poste');
@section('page-description', 'Gestion de poste');

@section('main-content')

    <div class="br-pagebody">
        <div class="br-section-wrapper">

            <form action="{{ route('postes.update', $poste->id) }}" method="post">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-lg-4">
                        <input class="form-control @error('nom') is-invalid @enderror" name="nom" type="text"
                            value="{{ old('nom', $poste->nom) }}">
                        @error('nom')
                            <div class="invalid-feedback">
                                {{ $errors->first('nom') }}
                            </div>
                        @enderror
                    </div><!-- col -->
                </div><!-- row -->
                <div>
                    <label for="description"></label>
                    <textarea name="description" id="description" cols="30" rows="10" placeholder="Entrez la description"
                        class="form-control @error('description') is-invalid @enderror">{{ old('description', $poste->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $errors->first('description') }}
                        </div>
                    @enderror
                </div>
                <div class="row mt-2 mx-auto">
                    <button type="submit" class="btn btn-success">Mettre à jour le poste</button>
                </div>
            </form>
        </div>
    </div>

@endsection
