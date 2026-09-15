@extends('layouts.app')
@section('title', 'Modifier un stage')
@section('content')
    <div class="page-head">
        <div>
            <h1 class="page-title">Modifier un stage</h1>
            <p class="page-subtitle">Mettez à jour les informations du stage.</p>
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
        <form action="{{ route('stages.update', $stage->id) }}" method="POST">@csrf @method('PUT')<div class="form-grid">
                <div class="form-group"><label class="form-label">Stagiaire</label><select class="form-control"
                        name="stagiaire_id" required>
                        @foreach ($stagiaires as $stagiaire)
                            <option value="{{ $stagiaire->id }}" {{ $stage->stagiaire_id == $stagiaire->id ? 'selected' : '' }}>
                                {{ $stagiaire->nom }} {{ $stagiaire->prenom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group"><label class="form-label">Service</label><select class="form-control"
                        name="service_id" required>
                        @foreach ($services as $service)
                            <option value="{{ $service->id }}" {{ $stage->service_id == $service->id ? 'selected' : '' }}>
                                {{ $service->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group"><label class="form-label">Encadrant</label>
                    @if (in_array(auth()->user()->role, ['admin', 'rh']))
                        <select class="form-control" name="encadrant_id" required>
                            @foreach ($encadrants as $encadrant)
                                <option value="{{ $encadrant->id }}"
                                    {{ $stage->encadrant_id == $encadrant->id ? 'selected' : '' }}>{{ $encadrant->name }}
                                </option>
                            @endforeach
                        </select>
                    @else<input type="hidden" name="encadrant_id" value="{{ $stage->encadrant_id }}">
                        <div class="form-control" style="background:#f8fafc">{{ optional($stage->encadrant)->name }}</div>
                    @endif
                </div>
                <div class="form-group"><label class="form-label">Statut</label><select class="form-control" name="statut"
                        required>
                        @foreach (['À venir', 'En cours', 'Terminé'] as $statut)
                            <option value="{{ $statut }}" {{ $stage->statut === $statut ? 'selected' : '' }}>
                                {{ $statut }}</option>
                        @endforeach
                    </select></div>
                <div class="form-group"><label class="form-label">Date de début</label><input class="form-control"
                        type="date" name="date_debut" value="{{ old('date_debut', $stage->date_debut) }}" required></div>
                <div class="form-group"><label class="form-label">Date de fin</label><input class="form-control"
                        type="date" name="date_fin" value="{{ old('date_fin', $stage->date_fin) }}" required></div>
                <div class="form-group full"><label class="form-label">Thème</label><input class="form-control"
                        type="text" name="theme" value="{{ old('theme', $stage->theme) }}" required></div>
            </div>
            <div class="form-footer"><a class="btn btn-secondary" href="{{ route('stages.index') }}">Annuler</a><button
                    class="btn btn-primary" type="submit">Enregistrer les modifications</button></div>
        </form>
    </div>
@endsection
