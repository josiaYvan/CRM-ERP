@extends('blank')
@section('page-title', 'Listes de personnel')
@section('page-description', 'Gestion de personnel')


@section('main-content')
    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <h6 class="br-section-label">TABLE PERSONNEL</h6>
            <p class="br-section-text">Information concernant les personnels.</p>
            @if (auth()->user()->role === 1)
                <a href="{{ route('personnels.create') }}" class="btn btn-info mb-2 float-right">Ajouter personnel</a>
            @endif

            <div class="bd bd-gray-300 rounded table-responsive">
                <table class="table mg-b-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Position</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($personnels as $personnel)
                            <tr>
                                <th scope="row">{{ $personnel->id }}</th>
                                <td> <img src="/storage/image_profil/{{ $personnel->image }} "
                                        style="width: 45px; height: 45px;" class="rounded-circle" alt="pic">
                                </td>
                                <td>{{ $personnel->nom }}</td>
                                <td>{{ $personnel->prenom }}</td>
                                <td>{{ $personnel->poste->nom }}</td>
                                <td class="d-flex">

                                    <a href="{{ route('personnels.show', $personnel->id) }}"
                                        class="btn btn-info btn-sm mr-2">Voir</a>
                                    @if (auth()->user()->role === 1)
                                        <a href="{{ route('personnels.edit', $personnel->id) }}"
                                            class="btn btn-warning btn-sm mr-2">Modifier</a>
                                        <form method="post" action="{{ route('personnels.destroy', $personnel->id) }}">
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
            </div>
        </div>
    </div>
@endsection
