@extends('blank')

@section('page-title', 'Demande de congé');
@section('page-departement', 'Pose de travail.');

@section('main-content')

    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <form action="{{ route('conges.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg mg-t-10 mg-lg-t-0">
                        <label for="date_debut" class="floatingTextarea2">Date de debut de congé</label>
                        <span class="float-right">Format de date: AAAA-MM-JJ</span>
                        <input value=" {{ old('date_debut') }} "
                            class="form-control @error('date_debut') is-invalid @enderror " name="date_debut"
                            type="text">
                        @error('date_debut')
                            <div class="invalid-feedback">
                                {{ $errors->first('date_debut') }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg mg-t-10 mg-lg-t-0">
                        <label for="date_retour" class="floatingTextarea2">Date de fin de congé</label>
                        <span class="float-right">Format de date: AAAA-MM-JJ</span>
                        <input value=" {{ old('date_retour') }} "
                            class="form-control @error('date_retour') is-invalid @enderror " name="date_retour"
                            type="text">
                        @error('date_retour')
                            <div class="invalid-feedback">
                                {{ $errors->first('date_retour') }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mg-t-20">
                    <div class="col-lg mg-t-10 mg-lg-t-0">
                        <label for="motif" class="floatingTextarea ">Motif</label>
                        <textarea name="motif" class="form-control @error('motif') is-invalid @enderror">{{ old('motif') }}</textarea>
                        @error('motif')
                            <div class="invalid-feedback">
                                {{ $errors->first('motif') }}
                            </div>
                        @enderror
                    </div>

                </div>
                <div class="col-lg mg-t-10 mg-lg-t-0">
                    <input value=" {{ old('maternite') }} " type="checkbox"
                        class="form-check-input"value=" {{ old('nb_jour') }} " name="maternite" id="">
                    <label for="maternite" class="floatingTextarea2">Maternité</label>
                </div>
                <button type="submit" class="btn btn-success ">Envoyer</button>
            </form>
        </div>
    </div>

@endsection
