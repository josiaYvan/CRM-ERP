@extends('blank')

@section('page-title', 'Poste');
@section('main-content')
    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <h2>{{ $poste->nom }}</h2>
            <p>{{ $poste->description }}</p>
            <a href="{{ route('postes.index') }}" class="btn btn-info btn-sm">Retour</a>
        </div>
    </div>
@endsection
