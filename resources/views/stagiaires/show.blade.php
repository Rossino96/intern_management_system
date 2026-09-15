@extends('layouts.app')
@section('title', 'Informations du stagiaire')
@section('content')
    <div class="page-head">
        <div>
            <h1 class="page-title">{{ $stagiaire->nom }} {{ $stagiaire->prenom }}</h1>
            <p class="page-subtitle">Informations et stages associés.</p>
        </div><a class="btn btn-secondary" href="{{ route('stagiaires.index') }}">← Retour</a>
    </div>
    <section class="card card-body">
        <h2 class="section-title">Informations personnelles</h2>
        <div class="profile-grid">
            <div class="profile-item"><small>Nom</small><strong>{{ $stagiaire->nom }}</strong></div>
            <div class="profile-item"><small>Prénom</small><strong>{{ $stagiaire->prenom }}</strong></div>
            <div class="profile-item"><small>Sexe</small><strong>{{ $stagiaire->sexe }}</strong></div>
            <div class="profile-item"><small>Date de naissance</small><strong>{{ $stagiaire->date_naissance }}</strong>
            </div>
            <div class="profile-item"><small>Téléphone</small><strong>{{ $stagiaire->telephone }}</strong></div>
            <div class="profile-item"><small>Email</small><strong>{{ $stagiaire->email }}</strong></div>
            <div class="profile-item"><small>Établissement</small><strong>{{ $stagiaire->etablissement }}</strong></div>
            <div class="profile-item"><small>Filière</small><strong>{{ $stagiaire->filiere }}</strong></div>
            <div class="profile-item"><small>Niveau</small><strong>{{ $stagiaire->niveau }}</strong></div>
            <div class="profile-item"><small>Adresse</small><strong>{{ $stagiaire->adresse }}</strong></div>
        </div>
    </section>
    <section class="card card-body" style="margin-top:18px">
        <h2 class="section-title">Stages associés</h2>
        <div class="table-wrap">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Service</th>
                        <th>Encadrant</th>
                        <th>Début</th>
                        <th>Fin</th>
                        <th>Statut</th>
                        <th>Thème</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($stagiaire->stages as $stage)
                        <tr>
                            <td>{{ optional($stage->service)->nom }}</td>
                            <td>{{ optional($stage->encadrant)->name }}</td>
                            <td>{{ $stage->date_debut }}</td>
                            <td>{{ $stage->date_fin }}</td>
                            <td>{{ $stage->statut }}</td>
                            <td>{{ $stage->theme }}</td>
                    </tr>@empty<tr>
                            <td colspan="6" class="muted">Aucun stage associé.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
