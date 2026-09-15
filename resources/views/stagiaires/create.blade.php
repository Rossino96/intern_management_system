@extends('layouts.app')
@section('title', 'Ajouter un stagiaire')
@section('content')
    <div class="page-head">
        <div>
            <h1 class="page-title">Ajouter un stagiaire</h1>
            <p class="page-subtitle">Remplissez les informations du stagiaire.</p>
        </div><a class="btn btn-secondary" href="{{ route('stagiaires.index') }}">← Retour</a>
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
        <form action="{{ route('stagiaires.store') }}" method="POST">@csrf<div class="form-grid">
                <div class="form-group"><label class="form-label">Nom</label><input class="form-control" name="nom"
                        value="{{ old('nom') }}" required></div>
                <div class="form-group"><label class="form-label">Prénom</label><input class="form-control" name="prenom"
                        value="{{ old('prenom') }}" required></div>
                <div class="form-group"><label class="form-label">Sexe</label><select class="form-control" name="sexe">
                        <option value="">Sélectionner</option>
                        <option value="Homme" {{ old('sexe') === 'Homme' ? 'selected' : '' }}>Homme</option>
                        <option value="Femme" {{ old('sexe') === 'Femme' ? 'selected' : '' }}>Femme</option>
                    </select></div>
                <div class="form-group"><label class="form-label">Date de naissance</label><input class="form-control"
                        type="date" name="date_naissance" value="{{ old('date_naissance') }}"></div>
                <div class="form-group"><label class="form-label">Téléphone</label><input class="form-control"
                        type="tel" name="telephone" value="{{ old('telephone') }}"></div>
                <div class="form-group"><label class="form-label">Email</label><input class="form-control" type="email"
                        name="email" value="{{ old('email') }}"></div>
                <div class="form-group full"><label class="form-label">Adresse</label>
                    <textarea class="form-control" name="adresse">{{ old('adresse') }}</textarea>
                </div>
                <div class="form-group"><label class="form-label">Établissement</label><input class="form-control"
                        name="etablissement" value="{{ old('etablissement') }}"></div>
                <div class="form-group"><label class="form-label">Filière</label><input class="form-control" name="filiere"
                        value="{{ old('filiere') }}"></div>
                <div class="form-group"><label class="form-label">Niveau</label><input class="form-control" name="niveau"
                        value="{{ old('niveau') }}"></div>
            </div>
            <div class="form-footer"><a class="btn btn-secondary" href="{{ route('stagiaires.index') }}">Annuler</a><button
                    class="btn btn-primary" type="submit">Enregistrer</button></div>
        </form>
    </div>
@endsection
