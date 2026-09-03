<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@extends('layouts.app')

    @section('title', 'Ajouter un utilisateur')

        @section('content')

        <div class="container">

            <h1 class="mb-4">Ajouter un utilisateur</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('users.store') }}" method="POST">

                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nom</label>

                    <input type="text"
                        name="name"
                        id="name"
                        class="form-control"
                        value="{{ old('name') }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>

                    <input type="email"
                        name="email"
                        id="email"
                        class="form-control"
                        value="{{ old('email') }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>

                    <input type="password"
                        name="password"
                        id="password"
                        class="form-control"
                        required>
                </div>

                <div class="mb-3">
                    <label for="role" class="form-label">Rôle</label>

                    <select name="role" id="role" class="form-select" required>

                        <option value="">-- Choisir un rôle --</option>

                        <option value="admin">Administrateur</option>
                        <option value="rh">Responsable RH</option>
                        <option value="encadrant">Encadrant</option>

                    </select>
                </div>

                <button type="submit" class="btn btn-primary">
                    Enregistrer
                </button>

                <a href="{{ route('users.index') }}" class="btn btn-secondary">
                    Annuler
                </a>

            </form>

        </div>

    @endsection
</body>
</html>