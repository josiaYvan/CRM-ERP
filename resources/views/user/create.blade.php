@extends('blank')

@section('page-title', 'Ajout utilisateur');
@section('page-departement', 'Gestion d\'utilisateur');

@section('main-content')
    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <form action="{{ route('users.store') }}" method="post">
                @csrf
                <h3 class="title-form">Ajouter un utilisateur</h3>
                <div class="form-group">

                    <select name="name" class="form-control @error('name') is-invalid @enderror ">
                        <option selected value="">Nom de l'utilisateur</option>
                        @foreach ($personnels as $item)
                            <option value=" {{ $item->id }} "> {{ $item->nom }}
                            </option>
                        @endforeach
                    </select>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @enderror
                    @error('email')
                        <div class="text-danger">
                            {{ $errors->first('email') }}
                        </div>
                    @enderror
                    <div class="form-group position-relative">

                        <label for="password">Mot de passe</label>
                        <input type="password" class="form-control" name="password" id="password ">
                        <div id="password-field" style="position : absolute; margin-top: -6%; margin-left: 93%">
                        </div>
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <label for="role">Statut:</label>
                    <select name="role" class="form-select" id="role">
                        <option value="">Choisir un statut</option>
                        <option value="0" {{ old('role') == '0' ? 'selected' : '' }}>Utilisateur
                        </option>
                        <option value="1" {{ old('role') == '1' ? 'selected' : '' }}>Administrateur
                        </option>

                    </select>
                    @error('role')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <a href="{{ route('users.index') }}" class="btn btn-primary btn-sm mr-2">Retour</a>
                <button type="submit" class="btn btn-success btn-sm" id="form-create">Ajouter</button>
            </form>
        </div>
    </div>
@endsection
