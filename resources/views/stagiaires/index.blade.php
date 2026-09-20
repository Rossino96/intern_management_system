@extends('layouts.app')
@section('title', 'Stagiaires')
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
<div class="page-head">

    <div class="page-head-top">

        <div>
            <h1 class="page-title">
                Stagiaires
            </h1>

            <p class="page-subtitle">
                Consultez et gérez les stagiaires enregistrés.
            </p>
        </div>

        <div class="stagiaires-tools">

            {{-- Recherche --}}
            <div class="tool-wrapper tool-search">

                <button
                    type="button"
                    class="tool-icon"
                    id="search-toggle"
                    aria-label="Rechercher"
                    title="Rechercher"
                >
                    🔍
                </button>

                <div class="stagiaires-search-panel" id="search-panel">

                    <form method="GET" action="{{ route('stagiaires.index') }}">

                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Nom, prénom, email..."
                        >

                        <button type="submit" class="btn btn-primary">
                            Rechercher
                        </button>

                    </form>

                </div>

            </div>


            {{-- Filtres --}}
            <div class="tool-wrapper tool-filter">

                <button
                    type="button"
                    class="tool-icon"
                    id="filter-toggle"
                    aria-label="Filtrer"
                    title="Filtrer"
                >
                    ⚙️
                </button>

                <div class="stagiaires-filter-panel" id="filter-panel">

                    <form method="GET" action="{{ route('stagiaires.index') }}">

                        <div class="filter-group">

                            <label for="filter-sexe">
                                Sexe
                            </label>

                            <select name="sexe" id="filter-sexe">

                                <option value="">Tous</option>

                                <option value="Homme"
                                    {{ request('sexe') == 'Homme' ? 'selected' : '' }}>
                                    Homme
                                </option>

                                <option value="Femme"
                                    {{ request('sexe') == 'Femme' ? 'selected' : '' }}>
                                    Femme
                                </option>

                            </select>

                        </div>


                        <div class="filter-group">

                            <label for="filter-niveau">
                                Niveau
                            </label>

                            <select name="niveau" id="filter-niveau">

                                <option value="">Tous</option>

                                <option value="L1" {{ request('niveau') == 'L1' ? 'selected' : '' }}>
                                    L1
                                </option>

                                <option value="L2" {{ request('niveau') == 'L2' ? 'selected' : '' }}>
                                    L2
                                </option>

                                <option value="L3" {{ request('niveau') == 'L3' ? 'selected' : '' }}>
                                    L3
                                </option>

                                <option value="M1" {{ request('niveau') == 'M1' ? 'selected' : '' }}>
                                    M1
                                </option>

                                <option value="M2" {{ request('niveau') == 'M2' ? 'selected' : '' }}>
                                    M2
                                </option>

                            </select>

                        </div>


                        <div class="filter-actions">

                            <button type="submit" class="btn btn-primary">
                                Appliquer
                            </button>

                            <a
                                href="{{ route('stagiaires.index') }}"
                                class="btn btn-secondary"
                            >
                                Réinitialiser
                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>


    <div class="page-head-bottom">

        <div class="actions">

            <a class="btn btn-secondary" href="{{ route('dashboard') }}">
                ← Dashboard
            </a>

            @if (in_array(auth()->user()->role, ['admin', 'rh']))

                <a class="btn btn-primary" href="{{ route('stagiaires.create') }}">
                    + Ajouter
                </a>

            @endif

        </div>

    </div>

</div>

        <div class="stagiaires-search-panel" id="search-panel">
            <form method="GET" action="{{ route('stagiaires.index') }}">
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Nom, prénom, email, établissement...">

                <button type="submit" class="btn btn-primary">
                    Rechercher
                </button>
            </form>
        </div>

        <div class="stagiaires-filter-panel" id="filter-panel">

            <form method="GET" action="{{ route('stagiaires.index') }}">

                <div class="filter-group">
                    <label for="filter-sexe">Sexe</label>

                    <select name="sexe" id="filter-sexe">
                        <option value="">Tous</option>
                        <option value="Homme" {{ request('sexe') == 'Homme' ? 'selected' : '' }}>
                            Homme
                        </option>
                        <option value="Femme" {{ request('sexe') == 'Femme' ? 'selected' : '' }}>
                            Femme
                        </option>
                    </select>
                </div>

                <div class="filter-group">
                    <label for="filter-niveau">Niveau</label>

                    <select name="niveau" id="filter-niveau">
                        <option value="">Tous</option>

                        <option value="L1" {{ request('niveau') == 'L1' ? 'selected' : '' }}>
                            L1
                        </option>

                        <option value="L2" {{ request('niveau') == 'L2' ? 'selected' : '' }}>
                            L2
                        </option>

                        <option value="L3" {{ request('niveau') == 'L3' ? 'selected' : '' }}>
                            L3
                        </option>

                        <option value="M1" {{ request('niveau') == 'M1' ? 'selected' : '' }}>
                            M1
                        </option>

                        <option value="M2" {{ request('niveau') == 'M2' ? 'selected' : '' }}>
                            M2
                        </option>
                    </select>
                </div>

                <div class="actions">
                    <button type="submit" class="btn btn-primary">
                        Appliquer
                    </button>

                    <a href="{{ route('stagiaires.index') }}" class="btn btn-secondary">
                        Réinitialiser
                    </a>
                </div>

            </form>

        </div>

        <div class="carousel-shell">
            <button class="carousel-nav carousel-prev" data-carousel-prev type="button">
                ‹
            </button>
            <div class="carousel-viewport">
                <div class="carousel-track" data-carousel-track>
                    @foreach ($stagiaires as $stagiaire)
                        <article class="stagiaire-card" data-carousel-card>

                            @if ($stagiaire->photo)
                                <div class="avatar">
                                    <img src="{{ asset('storage/' . $stagiaire->photo) }}"
                                        alt="Photo de {{ $stagiaire->prenom }} {{ $stagiaire->nom }}">
                                </div>
                            @else
                                <div class="avatar">
                                    {{ strtoupper(substr($stagiaire->prenom ?? $stagiaire->nom, 0, 1)) }}
                                </div>
                            @endif

                            <div class="stagiaire-info">
                                <h2>{{ $stagiaire->nom }} {{ $stagiaire->prenom }}</h2>
                                <p>{{ $stagiaire->etablissement }}</p>
                            </div>
                            <div class="carousel-count">
                                <span class="badge badge-blue">
                                    {{ $stagiaire->stages_count }}
                                    stage{{ $stagiaire->stages_count > 1 ? 's' : '' }}
                                </span>
                            </div>
                            <div class="actions" style="justify-content:center;margin-top:18px">
                                <a class="btn btn-info" href="{{ route('stagiaires.show', $stagiaire->id) }}">
                                    Informations
                                </a>
                                @if (in_array(auth()->user()->role, ['admin', 'rh']))
                                    <a class="btn btn-warning" href="{{ route('stagiaires.edit', $stagiaire->id) }}">
                                        Modifier
                                    </a>
                                    <form action="{{ route('stagiaires.destroy', $stagiaire->id) }}" method="POST"
                                        data-confirm="Voulez-vous vraiment supprimer ce stagiaire ?">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">
                                            Supprimer
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </article>
                    @endforeach
                </div>

            </div>
            <button class="carousel-nav carousel-next" data-carousel-next type="button">
                ›
            </button>
        </div>
        @if ($stagiaires->isEmpty())
            <div class="card card-body" style="text-align:center">
                <p class="muted">
                    Aucun stagiaire trouvé.
                </p>
            </div>
        @endif
    @endsection
