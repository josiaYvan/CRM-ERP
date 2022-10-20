@extends('blank')
@section('page-title', 'Detail du personnel')
@section('page-description', 'Gestion de personnel')

@section('main-content')
    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <h2>{{ $personnel->nom }}</h2>
            <img src="/storage/image_profil/{{ $personnel->image }} "
                style="max-width: 30%; position:absolute; right: 6%; top: 5%; max-height: 90%"
                class="rounded-5 border border-5" alt="pic">
            <p>Prenom: <em> {{ $personnel->prenom }} </em> </p>
            <p>Mail: <em> {{ $personnel->email }} </em> </p>
            <p>Date de naissance: <em> {{ strftime('%d-%m-%Y', strtotime($personnel->date_naissance)) }} </em> </p>
            <p>Telephone: <em> {{ $personnel->telephone }} </em> </p>
            <p>Poste: <em> {{ $personnel->poste->nom }} </em> </p>
            <p>Déscription: <em> {{ $personnel->description }} </em></p>
            <a href="{{ route('personnels.index') }}" class="btn btn-info btn-sm">Retour</a>
            <a href="{{ route('personnels.edit', $personnel->id) }}" class="btn btn-warning btn-sm">Modifier</a>
        </div>
    </div>
@endsection
