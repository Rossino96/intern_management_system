
    @extends('layouts.app')

    @section('title', 'Modifier un utilisateur')

        @section('content')

        <div class="container">

            <h1 class="mb-4">Modifier un utilisateur</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <a href="{{ route('users.index') }}" class="btn btn-secondary">
                ← Retour aux users
            </a>

            <form action="{{ route('users.update', $user) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Nom</label>

                    <input type="text"
                        name="name"
                        id="name"
                        class="form-control"
                        value="{{ old('name', $user->name) }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>

                    <input type="email"
                        name="email"
                        id="email"
                        class="form-control"
                        value="{{ old('email', $user->email) }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label" autocomplete="new-password"  autocomplete="off">
                        Nouveau mot de passe
                    </label>

                    <input type="password"
                        name="new_password" class="form-control">

                    <small class="text-muted">
                        Laisser vide pour conserver le mot de passe actuel.
                    </small>

                </div>

                <div class="mb-3">
                    <label for="role" class="form-label">Rôle</label>

                    <select name="role" id="role" class="form-select" required>

                        <option value="admin"
                            {{ $user->role === 'admin' ? 'selected' : '' }}>
                            Administrateur
                        </option>

                        <option value="rh"
                            {{ $user->role === 'rh' ? 'selected' : '' }}>
                            Responsable RH
                        </option>

                        <option value="encadrant"
                            {{ $user->role === 'encadrant' ? 'selected' : '' }}>
                            Encadrant
                        </option>

                    </select>
                </div>

                <button type="submit" class="btn btn-primary">
                    Enregistrer les modifications
                </button>

                <a href="{{ route('users.index') }}" class="btn btn-secondary">
                    Annuler
                </a>

            </form>

        </div>

        @endsection
