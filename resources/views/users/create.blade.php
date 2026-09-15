@extends('layouts.app')
@section('title', 'Ajouter un utilisateur')
@section('content')
    <div class="page-head">
        <div>
            <h1 class="page-title">Ajouter un utilisateur</h1>
            <p class="page-subtitle">Créez un compte avec son rôle.</p>
        </div><a class="btn btn-secondary" href="{{ route('users.index') }}">← Retour</a>
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
        <form action="{{ route('users.store') }}" method="POST">@csrf<div class="form-grid">
                <div class="form-group full"><label class="form-label" for="name">Nom</label><input class="form-control"
                        id="name" name="name" value="{{ old('name') }}" required></div>
                <div class="form-group"><label class="form-label" for="email">Email</label><input class="form-control"
                        type="email" id="email" name="email" value="{{ old('email') }}" required></div>
                <div class="form-group"><label class="form-label" for="password">Mot de passe</label><input
                        class="form-control" type="password" id="password" name="password" autocomplete="new-password"
                        required></div>
                <div class="form-group full"><label class="form-label" for="role">Rôle</label><select
                        class="form-control" id="role" name="role" required>
                        <option value="">-- Choisir un rôle --</option>
                        <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Administrateur</option>
                        <option value="rh" {{ old('role') === 'rh' ? 'selected' : '' }}>Responsable RH</option>
                        <option value="encadrant" {{ old('role') === 'encadrant' ? 'selected' : '' }}>Encadrant</option>
                    </select></div>
            </div>
            <div class="form-footer"><a class="btn btn-secondary" href="{{ route('users.index') }}">Annuler</a><button
                    class="btn btn-primary" type="submit">Enregistrer</button></div>
        </form>
    </div>
@endsection
