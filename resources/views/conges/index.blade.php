@extends('blank')

@section('page-title', 'Conge')
@section('page-description', 'Gestion de poste')

@section('main-content')

    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <h6 class="br-section-label">TABLE CONGES</h6>
            <p class="br-section-text">Poste de l'entreprise</p>
            @if (auth()->user()->role !== 3)
                <a href="{{ route('conges.create') }}" class="btn btn-info mb-2 float-right">Demander congé</a>
            @endif
            <div class="bd bd-gray-300 rounded table-responsive">
                <table class="table mg-b-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>MOTIF</th>
                            <th>MATERNITE</th>
                            @if (auth()->user()->role !== 2)
                                <th>VALIDE</th>
                            @endif

                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($conges as $item)
                            <tr>
                                <td>
                                    {{ $item->id }}
                                </td>
                                <td>
                                    {{ $item->collaborateur }}
                                </td>
                                <td>
                                    {{ $item->motif }}
                                </td>
                                <td>
                                    {{ $item->maternite == 0 ? 'Non' : 'Oui' }}
                                </td>
                                @if (auth()->user()->role !== 2)
                                    @if ($item->validité == 0)
                                        <th>
                                            Non validé
                                        </th>
                                    @else
                                        <th class=" {{ $item->validité == 2 ? 'text-danger' : 'text-success' }}">
                                            {{ $item->validité == 2 ? 'Refusé' : 'Validé' }}
                                    @endif
                                    </th>
                                @endif
                                <td class="d-flex">
                                    <a href="{{ route('conges.show', $item->id) }}"
                                        class="btn btn-info btn-sm mr-2">Voir</a>
                                    @if (auth()->user()->role === 2)
                                        <a href="{{ route('conges.edit', $item->id) }}"
                                            class="btn btn-success btn-sm mr-2 {{ $item->validité == 0 ? '' : 'disabled' }} ">Accepter</a>
                                        <a href="{{ route('conges.denied', $item->id) }}"
                                            class="btn btn-danger btn-sm mr-2 {{ $item->validité == 0 ? '' : 'disabled' }} ">Refuser</a>
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
