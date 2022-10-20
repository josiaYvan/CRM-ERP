@extends('blank')
@section('page-title', 'Ajout personnel')
@section('page-description', 'Gestion de personnel')


@section('main-content')
    <div class="br-pagebody">
        <form method="POST" action=" {{ route('personnels.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="br-section-wrapper">
                <h6 class="br-section-label">Formulaire</h6>
                <p class="br-section-text">Création de personnel</p>

                <div class="row">
                    <div class="col-lg">
                        <input class="form-control @error('nom') is-invalid @enderror " name="nom" placeholder="Nom"
                            type="text" value="{{ old('nom') }}">
                        @error('nom')
                            <div class="invalid-feedback">
                                {{ $errors->first('nom') }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg mg-t-10 mg-lg-t-0">
                        <input class="form-control @error('prenom') is-invalid @enderror " name="prenom"
                            placeholder="Prenom" type="text" value="{{ old('prenom') }}">
                        @error('prenom')
                            <div class="invalid-feedback">
                                {{ $errors->first('prenom') }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mg-t-20">
                    <div class="col-lg mg-t-10 mg-lg-t-0">
                        <input class="form-control @error('date') is-invalid @enderror " name="date"
                            placeholder="Date de naissance" type="text" value="{{ old('date') }}">
                        @error('date')
                            <div class="invalid-feedback">
                                {{ $errors->first('date') }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg">
                        <input rows="3" class="form-control @error('email') is-invalid @enderror "
                            value="{{ old('email') }}" name="email" placeholder="Email"></input>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mg-t-20">
                    <div class="col-lg mg-t-10 mg-lg-t-0">
                        <input rows="3" class="form-control @error('telephone') is-invalid @enderror "
                            name="telephone" placeholder="Telephone" value="{{ old('telephone') }}"></input>
                        @error('telephone')
                            <div class="invalid-feedback">
                                {{ $errors->first('telephone') }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg mg-t-10 mg-lg-t-0">
                        <select name="poste" class="form-control @error('poste') is-invalid @enderror ">
                            <option selected value="">Poste</option>
                            @error('poste')
                                <div class="invalid-feedback">
                                    {{ $errors->first('poste') }}
                                </div>
                            @enderror
                            @foreach ($postes as $item)
                                <option value=" {{ $item->id }} " {{ old('poste') == $item->id ? 'selected' : '' }}>
                                    {{ $item->nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mg-t-20  ">
                    <div class="col-lg mg-t-10 mg-lg-t-0">
                        <input type="file" rows="3" class="form-control @error('image') is-invalid @enderror "
                            name="image" value="{{ old('telephone') }}"></input>
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $errors->first('image') }}
                            </div>
                        @enderror
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-success ">Valider</button>
            </div>
        </form>
    </div>
@endsection
