@extends('blank')

@section('page-title', 'Congé');
@section('main-content')
    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <h6>Nom:</h6>
            <p>{{ $conge->collaborateur }}</p>
            <h6>Motif:</h6>
            <p>{{ $conge->motif }}</p>
            <h6>Nombre de jours demandé:</h6>
            <p>{{ $conge->nb_jour }}</p>
            <p>Maternité : {{ $conge->maternite == 0 ? 'Non' : 'Oui' }}</p>
            <h6>Validité:</h6>

            @if ($conge->validité == 0)
                <p>
                    Non validé
                </p>
            @else
                <p class=" {{ $conge->validité == 2 ? 'text-danger' : 'text-success' }}">
                    {{ $conge->validité == 2 ? 'Refusé' : 'Validé' }}
            @endif
            </p>
            <a href="{{ route('conges.index') }}" class="btn btn-info btn-sm">Retour</a>
        </div>
    </div>
@endsection
