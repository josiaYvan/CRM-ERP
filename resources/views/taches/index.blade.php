@extends('blank')

@section('page-title', 'Ajout tache')
@section('page-description', 'Gestion de tache')

@section('main-content')

    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <h6 class="br-section-label">TABLE TACHE</h6>
            <p class="br-section-text">Tache des employés</p>

            <a href="{{ route('taches.create') }}" class="btn btn-info mb-2 float-right">Ajouter une tache</a>
            <div class="bd bd-gray-300 rounded table-responsive">
                <div class="d-flex justify-content-center mt-3">
                    {{ $taches->links() }}
                </div>
                <table class="table mg-b-0">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Date de début</th>
                            <th>Date de fin</th>
                            <th>Personnel</th>
                            <th>Statut</th>
                            @if (Auth::user()->role === 1)
                                <th>Actions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($taches as $tache)
                            <tr>
                                <th scope="row">{{ $tache->titre }}</th>
                                <td>{{ $tache->date_debut }}</td>
                                <td>{{ $tache->date_fin }}</td>
                                <td>{{ $tache->personnel->nom }}</td>
                                <td>
                                    @if ($tache->status == 1)
                                        Tache terminé
                                    @else
                                        @if ($tache->created_at = now())
                                            Nouvelle tâche
                                        @else
                                            @if ($tache->date_fin <= now())
                                                Expiré
                                            @elseif ($tache->date_fin > now())
                                                En cours
                                            @endif
                                        @endif
                                    @endif
                                </td>
                                @if (Auth::user()->role === 1)
                                    <td class="d-flex">
                                        <a href="{{ route('taches.show', $tache->id) }}"
                                            class="btn btn-info btn-sm mr-2">Voir</a>
                                        @if ($tache->status === 0)
                                            <form method="post" action="{{ route('taches.done', $tache->id) }}">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm">Fait</button>
                                            </form>
                                        @endif
                                        <a href="{{ route('taches.edit', $tache->id) }}"
                                            class="btn btn-warning btn-sm mr-2">Modifier</a>
                                        <form method="post" action="{{ route('taches.destroy', $tache->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center mt-3">
                    {{ $taches->links() }}
                </div>
            </div><!-- bd -->
        </div>
    </div>

@endsection
