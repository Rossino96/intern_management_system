@extends('layouts.app')
@section('title', 'Services')
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
            <h1 class="page-title">Services</h1>
            <p class="page-subtitle">Gestion des services disponibles.</p>
        </div>
        <div class="actions"><a class="btn btn-secondary" href="{{ route('dashboard') }}">← Dashboard</a>
            @if (in_array(auth()->user()->role, ['admin', 'rh']))
                <a class="btn btn-primary" href="{{ route('services.create') }}">+ Ajouter</a>
            @endif
        </div>
    </div>
    <div class="card card-body table-wrap">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($services as $service)
                    <tr>
                        <td><strong>{{ $service->nom }}</strong></td>
                        <td>{{ $service->description }}</td>
                        <td>
                            @if (in_array(auth()->user()->role, ['admin', 'rh']))
                                <div class="table-actions"><a class="btn btn-warning"
                                        href="{{ route('services.edit', $service->id) }}">Modifier</a>
                                    <form action="{{ route('services.destroy', $service->id) }}" method="POST"
                                        data-confirm="Voulez-vous vraiment supprimer ce service ?">@csrf
                                        @method('DELETE')<button class="btn btn-danger" type="submit">Supprimer</button>
                                    </form>
                                </div>
                            @endif
                        </td>
                </tr>@empty<tr>
                        <td colspan="3" class="muted">Aucun service trouvé.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
