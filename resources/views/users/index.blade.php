@extends('layouts.app')
@section('title', 'Utilisateurs')
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <div class="page-head">
        <div>
            <h1 class="page-title">Utilisateurs</h1>
            <p class="page-subtitle">Gestion des comptes utilisateurs.</p>
        </div>
        <div class="actions"><a class="btn btn-secondary" href="{{ route('dashboard') }}">← Dashboard</a><a
                class="btn btn-primary" href="{{ route('users.create') }}">+ Ajouter</a></div>
    </div>
    <div class="card card-body table-wrap">
        <table class="data-table">
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
                        <td><strong>{{ $user->name }}</strong></td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if ($user->role === 'admin')
                                <span class="badge badge-red">Administrateur</span>
                            @elseif($user->role === 'rh')
                            <span class="badge badge-blue">Responsable RH</span>@else<span
                                    class="badge badge-green">Encadrant</span>
                            @endif
                        </td>
                        <td>
                            <div class="table-actions"><a class="btn btn-warning"
                                    href="{{ route('users.edit', $user) }}">Modifier</a>
                                <form action="{{ route('users.destroy', $user) }}" method="POST"
                                    data-confirm="Voulez-vous vraiment supprimer cet utilisateur ?">@csrf
                                    @method('DELETE')<button class="btn btn-danger" type="submit">Supprimer</button></form>
                            </div>
                        </td>
                </tr>@empty<tr>
                        <td colspan="4" class="muted">Aucun utilisateur trouvé.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
