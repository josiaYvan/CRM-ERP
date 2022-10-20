@extends('blank')

@section('page-title', 'Modification client');
@section('page-description', 'Gestion de client');

@section('main-content')

    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <h6 class="br-section-label">Basic Form Input</h6>
            <p class="br-section-text">A basic form control with disabled and readonly mode.</p>

            <form action="{{ route('clients.update', $client->id) }}" method="post">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-lg-4">
                        <input class="form-control @error('nom') is-invalid @enderror" value=" {{ $client->nom }} "
                            name="nom" placeholder="Entrez le nom du client" type="text">
                        @error('nom')
                            <div class="invalid-feedback">
                                {{ $errors->first('nom') }}
                            </div>
                        @enderror

                    </div><!-- col -->
                    <div class="col-lg-8">
                        <input class="form-control @error('description') is-invalid @enderror"
                            value=" {{ $client->description }} " name="description" placeholder="Description du client"
                            type="text">

                        @error('description')
                            <div class="invalid-feedback">
                                {{ $errors->first('description') }}
                            </div>
                        @enderror

                    </div><!-- col -->
                </div>
                <div class="row mt-2 mx-auto">
                    <button type="submit" class="btn btn-success">Mettre à jour le client</button>
                </div>
            </form>
        </div>
    </div>

@endsection
