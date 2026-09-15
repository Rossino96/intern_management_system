@extends('layouts.app')
@section('title', 'Modifier un utilisateur')
@section('content')
    <div class="page-head">
        <div>
            <h1 class="page-title">Modifier un utilisateur</h1>
            <p class="page-subtitle">Mettez à jour les informations du compte.</p>
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
        <form action="{{ route('users.update', $user) }}" method="POST">@csrf @method('PUT')<div class="form-grid">
                <div class="form-group full"><label class="form-label" for="name">Nom</label><input class="form-control"
                        id="name" name="name" value="{{ old('name', $user->name) }}" required></div>
                <div class="form-group"><label class="form-label" for="email">Email</label><input class="form-control"
                        type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required></div>
                <div class="form-group"><label class="form-label" for="new_password">Nouveau mot de passe</label><input
                        class="form-control" type="password" id="new_password" name="new_password"
                        autocomplete="new-password"><span class="form-help">Laisser vide pour conserver le mot de passe
                        actuel.</span></div>
                <div class="form-group full"><label class="form-label" for="role">Rôle</label><select
                        class="form-control" id="role" name="role" required>
                        <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Administrateur</option>
                        <option value="rh" {{ $user->role === 'rh' ? 'selected' : '' }}>Responsable RH</option>
                        <option value="encadrant" {{ $user->role === 'encadrant' ? 'selected' : '' }}>Encadrant</option>
                    </select></div>
            </div>
            <div class="form-footer"><a class="btn btn-secondary" href="{{ route('users.index') }}">Annuler</a><button
                    class="btn btn-primary" type="submit">Enregistrer les modifications</button></div>
        </form>
    </div>
@endsection
