@extends('layouts.app')
@section('title', 'Ajouter un service')
@section('content')
    <div class="page-head">
        <div>
            <h1 class="page-title">Ajouter un service</h1>
            <p class="page-subtitle">Créez un nouveau service.</p>
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
        <form action="{{ route('services.store') }}" method="POST">
            <div class="form-grid">@csrf<div class="form-group"><label class="form-label" for="nom">Nom</label><input
                        class="form-control" id="nom" name="nom" value="{{ old('nom') }}" required></div>
                <div class="form-group"><label class="form-label" for="description">Description</label><input
                        class="form-control" id="description" name="description" value="{{ old('description') }}"></div>
            </div>
            <div class="form-footer"><a class="btn btn-secondary" href="{{ route('services.index') }}">Annuler</a><button
                    class="btn btn-primary" type="submit">Enregistrer</button></div>
        </form>
    </div>
@endsection
