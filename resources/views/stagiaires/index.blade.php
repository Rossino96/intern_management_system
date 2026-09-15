@extends('layouts.app')
@section('title', 'Stagiaires')
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
            <h1 class="page-title">Stagiaires</h1>
            <p class="page-subtitle">Consultez et gérez les stagiaires enregistrés.</p>
        </div>
        <div class="actions"><a class="btn btn-secondary" href="{{ route('dashboard') }}">← Dashboard</a>
            @if (in_array(auth()->user()->role, ['admin', 'rh']))
                <a class="btn btn-primary" href="{{ route('stagiaires.create') }}">+ Ajouter</a>
            @endif
        </div>
    </div>
    <div class="carousel-shell"><button class="carousel-nav carousel-prev" data-carousel-prev type="button">‹</button>
        <div class="carousel-viewport">
            <div class="carousel-track" data-carousel-track>
                @foreach ($stagiaires as $stagiaire)
                    <article class="stagiaire-card" data-carousel-card>
                        <div class="avatar">{{ strtoupper(substr($stagiaire->prenom ?? $stagiaire->nom, 0, 1)) }}</div>
                        <div class="stagiaire-info">
                            <h2>{{ $stagiaire->nom }} {{ $stagiaire->prenom }}</h2>
                            <p>{{ $stagiaire->etablissement }}</p>
                        </div>
                        <div class="carousel-count"><span class="badge badge-blue">{{ $stagiaire->stages_count }}
                                stage{{ $stagiaire->stages_count > 1 ? 's' : '' }}</span></div>
                        <div class="actions" style="justify-content:center;margin-top:18px"><a class="btn btn-info"
                                href="{{ route('stagiaires.show', $stagiaire->id) }}">Informations</a>
                            @if (in_array(auth()->user()->role, ['admin', 'rh']))
                                <a class="btn btn-warning"
                                    href="{{ route('stagiaires.edit', $stagiaire->id) }}">Modifier</a>
                                <form action="{{ route('stagiaires.destroy', $stagiaire->id) }}" method="POST"
                                    data-confirm="Voulez-vous vraiment supprimer ce stagiaire ?">@csrf
                                    @method('DELETE')<button class="btn btn-danger" type="submit">Supprimer</button></form>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>
        </div><button class="carousel-nav carousel-next" data-carousel-next type="button">›</button>
    </div>
    @if ($stagiaires->isEmpty())
        <div class="card card-body" style="text-align:center">
            <p class="muted">Aucun stagiaire trouvé.</p>
        </div>
    @endif
@endsection
