@extends('layouts.app')

@section('title', 'Modifier le rapport')

@section('content')

<div class="page-head">
    <div>
        <h1 class="page-title">
            Modifier le rapport
        </h1>

        <p class="page-subtitle">
            Remplacez le rapport de stage actuel par un nouveau fichier PDF.
        </p>
    </div>

    <div class="actions">
        <a class="btn btn-secondary"
           href="{{ route('stages.edit', $rapport->stage_id) }}">
            ← Retour
        </a>
    </div>
</div>

<div class="card card-body">

    <div style="margin-bottom: 20px;">
        <strong>Stagiaire :</strong>

        {{ optional($rapport->stage->stagiaire)->nom }}
        {{ optional($rapport->stage->stagiaire)->prenom }}
    </div>

    <div style="margin-bottom: 20px;">
        <strong>Thème :</strong>

        {{ $rapport->stage->theme }}
    </div>

    <div style="margin-bottom: 20px;">
        <strong>Rapport actuel :</strong>

        <a
            href="{{ route('rapports.show', $rapport->id) }}"
            target="_blank"
        >
            📄 Voir le rapport actuel
        </a>
    </div>

    <form
        action="{{ route('rapports.update', $rapport->id) }}"
        method="POST"
        enctype="multipart/form-data"
    >

        @csrf
        @method('PUT')

        <div class="form-group">

            <label for="fichier">
                Nouveau rapport de stage (PDF)
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
                href="{{ route('stages.edit', $rapport->stage_id) }}"
                class="btn btn-secondary"
            >
                Annuler
            </a>

            <button
                type="submit"
                class="btn btn-primary"
            >
                🔄 Remplacer le rapport
            </button>

        </div>

    </form>

</div>

@endsection