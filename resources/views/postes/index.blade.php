@extends('blank')

@section('page-title', 'Ajout poste')
@section('page-description', 'Gestion de poste')

@section('main-content')

    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <h6 class="br-section-label">TABLE POSTE</h6>
            <p class="br-section-text">Poste de l'entreprise</p>
            @if (auth()->user()->role === 1)
                <a href="{{ route('postes.create') }}" class="btn btn-info mb-2 float-right">Ajouter poste</a>
            @endif
            <div class="bd bd-gray-300 rounded table-responsive">
                <table class="table mg-b-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($postes as $poste)
                            <tr>
                                <th scope="row">{{ $poste->id }}</th>
                                <td>{{ $poste->nom }}</td>

                                <td class="d-flex">

                                    <a href="{{ route('postes.show', $poste->id) }}"
                                        class="btn btn-info btn-sm mr-2">Voir</a>
                                    @if (auth()->user()->role === 1)
                                        <a href="{{ route('postes.edit', $poste->id) }}"
                                            class="btn btn-warning btn-sm mr-2">Modifier</a>
                                        <form method="post" action="{{ route('postes.destroy', $poste->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                        </form>
                                    @endif

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!-- bd -->
        </div>
    </div>

@endsection
