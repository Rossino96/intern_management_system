@extends('layouts.app')
@section('title', 'Modifier un stagiaire')
@section('content')
    <div class="page-head">
        <div>
            <h1 class="page-title">Modifier un stagiaire</h1>
            <p class="page-subtitle">Mettez à jour ses informations.</p>
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
        <form action="{{ route('stagiaires.update', $stagiaire->id) }}" method="POST">@csrf @method('PUT')<div
                class="form-grid">
                <div class="form-group"><label class="form-label">Nom</label><input class="form-control" name="nom"
                        value="{{ old('nom', $stagiaire->nom) }}" required></div>
                <div class="form-group"><label class="form-label">Prénom</label><input class="form-control" name="prenom"
                        value="{{ old('prenom', $stagiaire->prenom) }}" required></div>
                <div class="form-group"><label class="form-label">Sexe</label><select class="form-control" name="sexe">
                        <option value="">Sélectionner</option>
                        <option value="Homme" {{ old('sexe', $stagiaire->sexe) === 'Homme' ? 'selected' : '' }}>Homme</option>
                        <option value="Femme" {{ old('sexe', $stagiaire->sexe) === 'Femme' ? 'selected' : '' }}>Femme</option>
                    </select></div>
                <div class="form-group"><label class="form-label">Date de naissance</label><input class="form-control"
                        type="date" name="date_naissance" value="{{ old('date_naissance', $stagiaire->date_naissance) }}">
                </div>
                <div class="form-group"><label class="form-label">Téléphone</label><input class="form-control"
                        type="tel" name="telephone" value="{{ old('telephone', $stagiaire->telephone) }}"></div>
                <div class="form-group"><label class="form-label">Email</label><input class="form-control" type="email"
                        name="email" value="{{ old('email', $stagiaire->email) }}"></div>
                <div class="form-group full"><label class="form-label">Adresse</label>
                    <textarea class="form-control" name="adresse">{{ old('adresse', $stagiaire->adresse) }}</textarea>
                </div>
                <div class="form-group"><label class="form-label">Établissement</label><input class="form-control"
                        name="etablissement" value="{{ old('etablissement', $stagiaire->etablissement) }}"></div>
                <div class="form-group"><label class="form-label">Filière</label><input class="form-control" name="filiere"
                        value="{{ old('filiere', $stagiaire->filiere) }}"></div>
                <div class="form-group"><label class="form-label">Niveau</label><input class="form-control" name="niveau"
                        value="{{ old('niveau', $stagiaire->niveau) }}"></div>
            </div>
            <div class="form-footer"><a class="btn btn-secondary" href="{{ route('stagiaires.index') }}">Annuler</a><button
                    class="btn btn-primary" type="submit">Enregistrer les modifications</button></div>
        </form>
    </div>
@endsection
