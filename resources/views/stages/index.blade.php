@extends('layouts.app')
@section('title', 'Stages')
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
            <h1 class="page-title">Stages</h1>
            <p class="page-subtitle">Gestion et suivi des stages.</p>
        </div>
        <div class="actions"><a class="btn btn-secondary" href="{{ route('dashboard') }}">← Dashboard</a>
            @if (in_array(auth()->user()->role, ['admin', 'rh', 'encadrant']))
                <a class="btn btn-primary" href="{{ route('stages.create') }}">+ Ajouter</a>
            @endif
        </div>
    </div>
    <div class="card card-body table-wrap">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Stagiaire</th>
                    <th>Service</th>
                    <th>Encadrant</th>
                    <th>Date début</th>
                    <th>Date fin</th>
                    <th>Statut</th>
                    <th>Thème</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($stages as $stage)
                    <tr>
                        <td>{{ optional($stage->stagiaire)->nom }} {{ optional($stage->stagiaire)->prenom }}</td>
                        <td>{{ optional($stage->service)->nom }}</td>
                        <td>{{ optional($stage->encadrant)->name }}</td>
                        <td>{{ $stage->date_debut }}</td>
                        <td>{{ $stage->date_fin }}</td>
                        <td><span
                                class="badge @if ($stage->statut === 'Terminé') badge-green @elseif($stage->statut === 'En cours') badge-blue @else badge-amber @endif">{{ $stage->statut }}</span>
                        </td>
                        <td>{{ $stage->theme }}</td>
                        <td>
                            @if (auth()->user()->role === 'admin' ||
                                    auth()->user()->role === 'rh' ||
                                    (auth()->user()->role === 'encadrant' && $stage->encadrant_id == auth()->user()->id))
                                <div class="table-actions"><a class="btn btn-warning"
                                        href="{{ route('stages.edit', $stage->id) }}">Modifier</a>
                                    <form action="{{ route('stages.destroy', $stage->id) }}" method="POST"
                                        data-confirm="Voulez-vous vraiment supprimer ce stage ?">@csrf
                                        @method('DELETE')<button class="btn btn-danger" type="submit">Supprimer</button>
                                    </form>
                            </div>@else<span class="badge badge-gray">Consultation</span>
                            @endif
                        </td>
                </tr>@empty<tr>
                        <td colspan="8" class="muted">Aucun stage trouvé.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
