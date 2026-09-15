@extends('layouts.app')
@section('title', 'Ajouter un stage')
@section('content')
    <div class="page-head">
        <div>
            <h1 class="page-title">Ajouter un stage</h1>
            <p class="page-subtitle">Enregistrez un nouveau stage.</p>
        </div><a class="btn btn-secondary" href="{{ route('stages.index') }}">← Retour</a>
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
        <form action="{{ route('stages.store') }}" method="POST">@csrf<div class="form-grid">
                <div class="form-group"><label class="form-label">Stagiaire</label><select class="form-control"
                        name="stagiaire_id" required>
                        <option value="">-- Choisir --</option>
                        @foreach ($stagiaires as $stagiaire)
                            <option value="{{ $stagiaire->id }}" {{ old('stagiaire_id') == $stagiaire->id ? 'selected' : '' }}>
                                {{ $stagiaire->nom }} {{ $stagiaire->prenom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group"><label class="form-label">Service</label><select class="form-control"
                        name="service_id" required>
                        <option value="">-- Choisir --</option>
                        @foreach ($services as $service)
                            <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                                {{ $service->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group"><label class="form-label">Encadrant</label><select class="form-control"
                        name="encadrant_id" required>
                        <option value="">-- Choisir --</option>
                        @foreach ($encadrants as $encadrant)
                            <option value="{{ $encadrant->id }}" {{ old('encadrant_id') == $encadrant->id ? 'selected' : '' }}>
                                {{ $encadrant->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group"><label class="form-label">Statut</label><select class="form-control" name="statut"
                        required>
                        <option value="">-- Choisir --</option>
                        @foreach (['À venir', 'En cours', 'Terminé'] as $statut)
                            <option value="{{ $statut }}" {{ old('statut') === $statut ? 'selected' : '' }}>
                                {{ $statut }}</option>
                        @endforeach
                    </select></div>
                <div class="form-group"><label class="form-label">Date de début</label><input class="form-control"
                        type="date" name="date_debut" value="{{ old('date_debut') }}" required></div>
                <div class="form-group"><label class="form-label">Date de fin</label><input class="form-control"
                        type="date" name="date_fin" value="{{ old('date_fin') }}" required></div>
                <div class="form-group full"><label class="form-label">Thème</label><input class="form-control"
                        type="text" name="theme" value="{{ old('theme') }}" required></div>
            </div>
            <div class="form-footer"><a class="btn btn-secondary" href="{{ route('stages.index') }}">Annuler</a><button
                    class="btn btn-primary" type="submit">Enregistrer</button></div>
        </form>
    </div>
@endsection
