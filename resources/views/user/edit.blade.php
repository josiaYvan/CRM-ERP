@extends('blank')

@section('page-title', 'Modifier un poste');
@section('page-description', 'Gestion de poste');

@section('main-content')

    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <form action="{{ route('users.update', $user->id) }}" method="post">
                @csrf
                @method('PUT')
                <h3 class="title-form">Modifier un utilisateur</h3>
                <div class="form-group">
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <label for="name">Nom d'utilisateur</label>
                    <input type="text" class="form-control" name="name" id="name"
                        value="{{ old('name', $user->name) }}">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small><br>
                    @enderror
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="email "
                        value="{{ old('email', $user->email) }}">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small><br>
                    @enderror
                    <div class="form-group position-relative">

                        <label for="password">Mot de passe</label>
                        <input type="password" class="form-control" name="password" id="password ">
                        <div id="password-field" style="position : absolute; margin-top: -6%; margin-left: 93%">
                        </div>
                        @error('password')
                            <small class="text-danger">{{ $message }}</small><br>
                        @enderror
                    </div>
                    <label for="role">Statut:</label>
                    <select name="role" class="form-select" id="role">
                        <option value="">Aucun</option>
                        <option value="0" {{ old('role', $user->role) == '0' ? 'selected' : '' }}>Utilisateur</option>
                        <option value="1" {{ old('role', $user->role) == '1' ? 'selected' : '' }}>Administrateur
                        </option>

                    </select>
                    @error('role')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <a href="{{ route('users.index') }}" class="btn btn-primary btn-sm mr-2">Retour</a>
                <button type="submit" class="btn btn-Warning btn-sm" id="form-create">Modifier</button>
            </form>
        </div>
    </div>
@endsection
