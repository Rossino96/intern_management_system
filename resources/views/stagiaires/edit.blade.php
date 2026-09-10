@extends('layouts.app')

@section('title', 'Modifier un stagiaire')

@section('content')
    <h1>Modifier un stagiaire</h1>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        @endif

    <a href="{{ route('stagiaires.index') }}" class="btn btn-secondary">
        ← Retour aux stagiaires
    </a>

    <form action="/stagiaires/{{ $stagiaire->id }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="nom" value="{{ $stagiaire->nom }}">
        <input type="text" name="prenom" value="{{ $stagiaire->prenom }}">
        <input type="text" name="sexe" value="{{ $stagiaire->sexe }}">
        <input type="text" name="date_naissance" value="{{ $stagiaire->date_naissance }}">
        <input type="text" name="telephone" value="{{ $stagiaire->telephone }}">
        <input type="text" name="email" value="{{ $stagiaire->email }}">
        <input type="text" name="adresse" value="{{ $stagiaire->adresse }}">
        <input type="text" name="etablissement" value="{{ $stagiaire->etablissement }}">
        <input type="text" name="filiere" value="{{ $stagiaire->filiere }}">
        <input type="text" name="niveau" value="{{ $stagiaire->niveau }}">

        <button type="submit">Modifier</button>
    </form>
@endsection