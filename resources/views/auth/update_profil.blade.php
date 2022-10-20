@extends('blank')
@section('page-title', 'Modification de profil')
@section('page-description', 'Gestion de profil')


@section('main-content')
    <div class="br-pagebody">
        <form method="POST" action=" {{ route('profils.update', $user->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="br-section-wrapper">
                <div class="row">
                    <div class="col-lg">
                        @if (Auth::user()->image == null)
                            <p>No image</p>
                        @else
                            <img src="/storage/image_profil/{{ Auth::user()->image }}" alt="image de profil"
                                style="max-width: 100%; position:absolute; right: 6%; max-height: 100%"
                                class="rounded-5 border border-5">
                        @endif

                    </div>
                    <div class="col-lg">
                        <label for="Biography">Biographie:</label>
                        <textarea name="biography" class="form-control @error('biography') is-invalid @enderror " cols="30" rows="10">
                            {{ Auth::user()->biography }} </textarea>
                        @error('biography')
                            <div class="invalid-feedback">
                                {{ $errors->first('biography') }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mg-t-20">
                    <div class="col-lg">
                        <label for="name">Nom:</label>
                        <input class="form-control @error('name') is-invalid @enderror " type="text" name="name"
                            value=" {{ Auth::user()->name }} ">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg">
                        <label for="frist_name">Prenom:</label>
                        <input class="form-control @error('first_name') is-invalid @enderror " type="text"
                            name="first_name" value=" {{ Auth::user()->first_name }} ">
                        @error('first_name')
                            <div class="invalid-feedback">
                                {{ $errors->first('first_name') }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mg-t-20">
                    <div class="col-lg">
                        <label for="email">Email:</label>
                        <input class="form-control @error('email') is-invalid @enderror " type="text" name="email"
                            value=" {{ Auth::user()->email }} ">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg">
                        <label for="telephone">Telephone:</label>
                        <input class="form-control @error('telephone') is-invalid @enderror " type="text"
                            name="telephone" value=" {{ Auth::user()->telephone }} ">
                        @error('telephone')
                            <div class="invalid-feedback">
                                {{ $errors->first('telephone') }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mg-t-20">
                    <div class="col-lg">
                        <label for="image">Photo de profil:</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror "
                            name="image"></input>
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $errors->first('image') }}
                            </div>
                        @enderror
                        <button type="submit" class="btn mg-t-20 btn-success ">Valider</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
