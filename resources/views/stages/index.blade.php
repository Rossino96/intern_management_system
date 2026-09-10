@extends('layouts.app')

@section('title', 'Liste des stages')

@section('content')

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1>Liste des stages</h1>

        <div>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                ← Dashboard
            </a>

            @if(in_array(auth()->user()->role, ['admin', 'rh', 'encadrant']))
                <a href="{{ route('stages.create') }}" class="btn btn-primary">
                    <i class="fas fa-user-plus"></i>
                    Ajouter un stage
                </a>
            @endif
        </div>

    </div>

    <div class="table-responsive">

        <table class="table table-bordered table-striped">

            <thead class="table-dark">
                <tr>
                    <th>Date début</th>
                    <th>Date fin</th>
                    <th>Statut</th>
                    <th>Thème</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($stages as $stage)
                    <tr>
                        <td>{{ $stage->date_debut }}</td>
                        <td>{{ $stage->date_fin }}</td>
                        <td>{{ $stage->statut }}</td>
                        <td>{{ $stage->theme }}</td>
                        <td>    

                            @if(
                                auth()->user()->role === 'admin' ||
                                auth()->user()->role === 'rh' ||
                                (
                                    auth()->user()->role === 'encadrant' &&
                                    $stage->encadrant_id == auth()->user()->id
                                )
                            )

                                <a href="{{ route('stages.edit', $stage->id) }}"
                                   class="btn btn-warning btn-sm">
                                    Modifier
                                </a>

                                <form action="{{ route('stages.destroy', $stage->id) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Voulez-vous vraiment supprimer cet élément ?')">
                                            Supprimer
                                    </button>
                                </form>
                            @else
                                <span class="text-muted">
                                    Consultation
                                </span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection