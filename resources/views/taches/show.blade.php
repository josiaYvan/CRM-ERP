@extends('blank')

@section('page-title', 'Tache');
@section('main-content')
    <h2>{{ $tache->titre }}</h2>
    <p>Durée: {{ $tache->date_debut }} à {{ $tache->date_fin }} </p>
    <p>Fait par {{ $tache->personnel->nom }}</p>
    <h6>Description:</h6>
    <p>{{ $tache->description }}</p>
    <a href="{{ route('taches.index') }}" class="btn btn-info btn-sm">Retour</a>
@endsection
