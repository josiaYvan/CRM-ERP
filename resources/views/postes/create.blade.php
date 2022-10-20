@extends('blank')

@section('page-title', 'Ajout postes');
@section('page-departement', 'Gestion de postes');

@section('main-content')

    <div class="br-pagebody">
        <div class="br-section-wrapper">


            <form action="{{ route('postes.store') }}" method="post">
                @csrf
                <div class="">
                    <div class="">
                        <input class="form-control @error('nom') is-invalid @enderror" name="nom"
                            placeholder="Entrez le nom du poste" type="text" value="{{ old('nom') }}">
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
                        class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $errors->first('description') }}
                        </div>
                    @enderror
                </div>
                <div class="row mt-2 mx-auto">
                    <button type="submit" class="btn btn-success">Créer un poste</button>
                </div>
            </form>
        </div>
    </div>

@endsection
