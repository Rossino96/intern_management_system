@extends('layouts.app')

@section('title', 'Ajouter un rapport')

@section('content')

<div class="page-head">
    <div>
        <h1 class="page-title">
            Ajouter le rapport
        </h1>

        <p class="page-subtitle">
            Déposez le rapport de stage terminé.
        </p>
    </div>

    <div class="actions">
        <a class="btn btn-secondary" href="{{ route('stages.index') }}">
            ← Retour
        </a>
    </div>
</div>

<div class="card card-body">

    <div style="margin-bottom: 20px;">
        <strong>Stagiaire :</strong>
        {{ optional($stage->stagiaire)->nom }}
        {{ optional($stage->stagiaire)->prenom }}
    </div>

    <div style="margin-bottom: 20px;">
        <strong>Thème :</strong>
        {{ $stage->theme }}
    </div>

    <form
        action="{{ route('rapports.store', $stage->id) }}"
        method="POST"
        enctype="multipart/form-data"
    >

        @csrf

        <div class="form-group">

            <label for="fichier">
                Rapport de stage (PDF)
            </label>

            <input
                type="file"
                name="fichier"
                id="fichier"
                accept=".pdf,application/pdf"
                required
            >

            @error('fichier')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <div class="actions" style="margin-top: 20px;">

            <a
                href="{{ route('stages.index') }}"
                class="btn btn-secondary"
            >
                Annuler
            </a>

            <button
                type="submit"
                class="btn btn-primary"
            >
                Envoyer le rapport
            </button>

        </div>

    </form>

</div>

@endsection