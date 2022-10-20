@extends('blank')

@section('page-title', 'Conge')
@section('page-description', 'Gestion de users')

@section('main-content')

    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <h6 class="br-section-label">TABLE CONGES</h6>
            <p class="br-section-text">users de l'entreprise</p>

            <a href="{{ route('users.create') }}" class="btn btn-info mb-2 float-right">Ajouter un utilisateur</a>
            <div class="bd bd-gray-300 rounded table-responsive">
                <table class="table mg-b-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>STATUT</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                            <tr>
                                <td>
                                    {{ $item->id }}
                                </td>
                                <td>
                                    {{ $item->name }}
                                </td>
                                <td>
                                    {{ $item->role == 1 ? 'Administrateur' : 'Personnel' }}
                                </td>
                                <td class="d-flex">
                                    <a href="{{ route('users.edit', $item->id) }}"
                                        class="btn btn-warning btn-sm mr-2">Voir</a>
                                    <form method="post" action="{{ route('users.destroy', $item->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div><!-- bd -->
        </div>
    </div>

@endsection
