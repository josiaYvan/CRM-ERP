@extends('blank')
@section('page-title', 'Mon Profil')
@section('page-description', 'Gestion de profil')


@section('main-content')
    <div class="br-pagebody">
        <div class="br-section-wrapper">

            <div class="row">
                <div class="col-lg tx-center">
                    <h1>{{ Auth::user()->name }} </h1>
                    <h1>{{ Auth::user()->first_name }} </h1>
                    <h1>{{ Auth::user()->email }} </h1>
                    <h1>{{ Auth::user()->telephone }} </h1>
                    <h1>{{ Auth::user()->biography }} </h1>
                    <a href="{{ route('profils.edit', Auth::user()->id) }}" class="btn btn-info mb-2 float-left">Modifier le
                        profil</a>
                </div>
                <div class="col-lg ">
                    <img src="/storage/image_profil/{{ Auth::user()->image }}" alt="image de profil"
                        style="max-width: 100%; position:absolute; right: 6%;  max-height: 100%"
                        class="rounded-5 border border-5">
                </div>
            </div>
        </div>
    </div>
@endsection
