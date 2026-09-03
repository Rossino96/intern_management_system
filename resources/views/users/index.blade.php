<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        @extends('layouts.app')

    @section('title', 'Gestion des utilisateurs')

    @section('content')

    <div class="container">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Gestion des utilisateurs</h1>

            <a href="{{ route('users.create') }}" class="btn btn-primary">
                <i class="fas fa-user-plus"></i>
                Ajouter un utilisateur
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-body">

                <table class="table table-bordered table-hover">

                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Rôle</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($users as $user)

                            <tr>
                                <td>{{ $user->name }}</td>

                                <td>{{ $user->email }}</td>

                                <td>
                                    @if($user->role === 'admin')
                                        <span class="badge bg-danger">Admin</span>
                                    @elseif($user->role === 'rh')
                                        <span class="badge bg-primary">Responsable RH</span>
                                    @elseif($user->role === 'encadrant')
                                        <span class="badge bg-success">Encadrant</span>
                                    @endif
                                </td>

                                <td>

                                    <a href="{{ route('users.edit', $user) }}"
                                    class="btn btn-warning btn-sm">
                                        Modifier
                                    </a>

                                    <form action="{{ route('users.destroy', $user) }}"
                                        method="POST"
                                        class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?')">
                                            Supprimer
                                        </button>

                                    </form>

                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="4" class="text-center">
                                    Aucun utilisateur trouvé.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>
        </div>

    </div>

    @endsection
</body>
</html>