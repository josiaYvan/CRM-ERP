@extends('blank')
@section('page-title', 'Modification de peronnel')
@section('page-description', 'Gestion de peronnel')




@section('main-content')
    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <form action=" {{ route('personnels.update', $personnel->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <h6 class="br-section-label">Formulaire de Modification</h6>
                <p class="br-section-text">Personnel:
                    " {{ $personnel->nom }}"
                </p>
                <img src="/storage/image_profil/{{ $personnel->image }} "
                    style="max-width: 30%; position:absolute; right: 6%; top: 5%; max-height: 35%"
                    class="rounded-5 border border-5" alt="pic">

                <div class="row">
                    <div class="col-lg">
                        <input class="form-control @error('nom') is-invalid @enderror " name="nom"
                            value="{{ $personnel->nom }}" type="text" />
                        @error('nom')
                            <div class="invalidfeedback">
                                {{ $errors->first('nom') }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg mg-t-10 mg-lg-t-0">
                        <input class="form-control @error('prenom') is-invalid @enderror "
                            name="prenom"value="{{ $personnel->prenom }}" type="text" />
                        @error('prenom')
                            <div class="invalidfeedback">
                                {{ $errors->first('prenom') }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mg-t-20">
                    <div class="col-lg mg-t-10 mg-lg-t-0">
                        <input class="form-control @error('date') is-invalid @enderror " name="date"
                            value="{{ $personnel->date_naissance }}" type="text" />
                        @error('date')
                            <div class="invalidfeedback">
                                {{ $errors->first('date') }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg">
                        <input rows="3" class="form-control @error('email') is-invalid @enderror " name="email"
                            value="{{ $personnel->email }}" />
                        @error('email')
                            <div class="invalidfeedback">
                                {{ $errors->first('email') }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mg-t-20">
                    <div class="col-lg mg-t-10 mg-lg-t-0">
                        <input rows="3" class="form-control @error('telephone') is-invalid @enderror "
                            name="telephone" value="{{ $personnel->telephone }}" />
                        @error('telephone')
                            <div class="invalidfeedback">
                                {{ $errors->first('telephone') }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg mg-t-10 mg-lg-t-0">
                        <select name="poste" class="form-control @error('poste') is-invalid @enderror ">
                            @error('poste')
                                <div class="invalidfeedback">
                                    {{ $errors->first('poste') }}
                                </div>
                            @enderror
                            @foreach ($postes as $item)
                                <option value=" {{ $item->id }} "
                                    {{ $item->nom == $personnel->poste->nom ? 'selected' : '' }}>
                                    {{ $item->nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg">
                        <input type="file" class="form-control @error('image') is-invalid @enderror "
                            name="image"></input>
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $errors->first('image') }}
                            </div>
                        @enderror
                    </div>

                </div>
                <div class="row mg-t-20 ">
                    <button type="submit" class=" mr-2 btn btn-sm btn-success">Valider</button>

            </form>
            <td class="d-flex">
                <a href="{{ route('personnels.index') }}" class="btn btn-primary btn-sm mr-2">Retour</a>
                <form method="post" action="{{ route('personnels.destroy', $personnel->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                </form>
            </td>
        </div>
    </div>
    </div>
@endsection
