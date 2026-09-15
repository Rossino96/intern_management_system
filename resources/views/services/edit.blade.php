@extends('layouts.app')
@section('title', 'Modifier un service')
@section('content')
    <div class="page-head">
        <div>
            <h1 class="page-title">Modifier un service</h1>
            <p class="page-subtitle">Mettez à jour les informations du service.</p>
        </div><a class="btn btn-secondary" href="{{ route('services.index') }}">← Retour</a>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card form-card">
        <form action="{{ route('services.update', $service->id) }}" method="POST">@csrf @method('PUT')<div
                class="form-grid">
                <div class="form-group"><label class="form-label" for="nom">Nom</label><input class="form-control"
                        id="nom" name="nom" value="{{ old('nom', $service->nom) }}" required></div>
                <div class="form-group"><label class="form-label" for="description">Description</label><input
                        class="form-control" id="description" name="description"
                        value="{{ old('description', $service->description) }}"></div>
            </div>
            <div class="form-footer"><a class="btn btn-secondary" href="{{ route('services.index') }}">Annuler</a><button
                    class="btn btn-primary" type="submit">Enregistrer les modifications</button></div>
        </form>
    </div>
@endsection
