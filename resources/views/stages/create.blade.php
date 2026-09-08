@extends('layouts.app')

@section('title', 'Ajouter un stage')

@section('content')

    <h1>Ajouter Stage</h1>

        @if ($errors->any())
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        @endif

        <a href="{{ route('stages.index') }}" class="btn btn-secondary">
            ← Retour aux stages
        </a>
        
        <form action="/stages" method="POST">
            @csrf
            
            <select name="stagiaire_id">
                <option value="">-- Choisir un stagiaire --</option>

                @foreach ($stagiaires as $stagiaire)
                    <option value="{{ $stagiaire->id }}">
                        {{ $stagiaire->nom }} {{ $stagiaire->prenom }}
                    </option>
                @endforeach
            </select>

            <select name="service_id">
                <option value="">-- Choisir un service --</option>

                @foreach ($services as $service)
                    <option value="{{ $service->id }}">
                        {{ $service->nom }}
                    </option>
                @endforeach
            </select>

            <select name="encadrant_id"> 
                <option value="">-- Choisir un encadrant --</option>

                @foreach ($encadrants as $encadrant) 
                    <option value="{{ $encadrant->id }}"> 
                        {{ $encadrant->name }} 
                    </option> 
                @endforeach 
            </select>
        
        <input type="date" name="date_debut" placeholder="date_debut">
        <input type="date" name="date_fin" placeholder="date_fin">
        <select name="statut">
            <option value="">-- Choisir un statut --</option>
            <option value="À venir">À venir</option>
            <option value="En cours">En cours</option>
            <option value="Terminé">Terminé</option>
        </select>
        <input type="text" name="theme" placeholder="theme">

        <button type="submit">Enregistrer</button>

@endsection