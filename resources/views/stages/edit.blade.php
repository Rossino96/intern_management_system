@extends('layouts.app')

@section('title', 'Modifier un stage')

@section('content')
    <h1>Modifer un stage</h1>
        @if ($errors->any())
            @foreach ( $errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        @endif

    <a href="{{ route('stages.index') }}" class="btn btn-secondary">
        ← Retour aux stages
    </a>


    <form action="/stages/{{ $stage->id }}" method="POST">
        @csrf
        @method ('PUT')

            <select name="stagiaire_id">
                @foreach ($stagiaires as $stagiaire)
                    <option value="{{ $stagiaire->id }}"
                        {{ $stage->stagiaire_id == $stagiaire->id ? 'selected' : '' }}>
                        {{ $stagiaire->nom }} {{ $stagiaire->prenom }}
                    </option>
                @endforeach
            </select>

            <select name="service_id">
                @foreach ($services as $service)
                    <option value="{{ $service->id }}"
                        {{ $stage->service_id == $service->id ? 'selected' : '' }}>
                        {{ $service->nom }}
                    </option>
                @endforeach
            </select>

        @if(in_array(auth()->user()->role, ['admin', 'rh']))
            <select name="encadrant_id">
                @foreach ($encadrants as $encadrant)
                    <option value="{{ $encadrant->id }}"
                        {{ $stage->encadrant_id == $encadrant->id ? 'selected' : '' }}>
                        {{ $encadrant->name }}
                    </option>
                @endforeach
            </select>
        @else
            <input type="hidden" name="encadrant_id" value="{{ $stage->encadrant_id }}">

            <p>
                Encadrant :
                {{ $stage->encadrant->name }}
            </p>
        @endif

        <input type="date" name="date_debut" value="{{$stage->date_debut}}">
        <input type="date" name="date_fin" value="{{$stage->date_fin}}">

        <select name="statut">
            <option value="">-- Choisir un statut --</option>

            <option value="À venir"
                {{ $stage->statut == 'À venir' ? 'selected' : '' }}>
                À venir
            </option>

            <option value="En cours"
                {{ $stage->statut == 'En cours' ? 'selected' : '' }}>
                En cours
            </option>

            <option value="Terminé"
                {{ $stage->statut == 'Terminé' ? 'selected' : '' }}>
                Terminé
            </option>
        </select>

        <input type="text" name="theme" value="{{$stage->theme}}">

        <button type="submit">Modifier</button>
    </form>
@endsection