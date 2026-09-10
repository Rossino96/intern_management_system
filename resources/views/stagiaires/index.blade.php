@extends('layouts.app')

@section('title', 'Liste des stagiaires')

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

        <h1>Liste des stagiaires</h1> 

        <div>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                ← Dashboard
            </a>

            @if(in_array(auth()->user()->role, ['admin', 'rh'])) 
                <a href="{{ route('stagiaires.create') }}" class="btn btn-primary"> 
                    <i class="fas fa-user-plus"></i>
                    Ajouter un stagiaire 
                </a> 
            @endif 
        </div>
    </div>

        
        <table class="table table-bordered table-striped"> 
            <thead class="table-dark">
                <tr>
                    <th>nom</th>
                    <th>prenom</th>
                    <th>sexe</th>
                    <th>date_naissance</th>
                    <th>telephone</th>
                    <th>email</th>
                    <th>adresse</th>
                    <th>etablissement</th>
                    <th>filiere</th>
                    <th>niveau</th>
                    <th>Nombre de stages</th>
                    <th>Actions</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach ($stagiaires as $stagiaire) 
                    <tr> 
                        <td>{{ $stagiaire->nom }}</td> 
                        <td>{{ $stagiaire->prenom }}</td> 
                        <td>{{ $stagiaire->sexe }}</td> 
                        <td>{{ $stagiaire->date_naissance }}</td> 
                        <td>{{ $stagiaire->telephone }}</td> 
                        <td>{{ $stagiaire->email }}</td> 
                        <td>{{ $stagiaire->adresse }}</td> 
                        <td>{{ $stagiaire->etablissement }}</td> 
                        <td>{{ $stagiaire->filiere }}</td> 
                        <td>{{ $stagiaire->niveau }}</td> 
                        <td>{{ $stagiaire->stages_count }}</td>

                        <td> 
                            @if(in_array(auth()->user()->role, ['admin', 'rh'])) 
                                <a href="{{ route('stagiaires.edit', $stagiaire->id) }}"
                                class="btn btn-warning btn-sm">
                                    Modifier 
                                </a> 

                                
                                <form action="{{ route('stagiaires.destroy', $stagiaire->id) }}" 
                                method="POST"
                                class="d-inline"> 
                                
                                @csrf 
                                @method('DELETE') 
                                
                                <button type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Voulez-vous vraiment supprimer ce stage ?')">
                                    Supprimer
                                </button> 
                                <a href="{{ route('stagiaires.show', $stagiaire->id) }}"
                                    class="btn btn-info btn-sm">
                                    Information du stagiaire 
                                </a> 
                                </form> 
                            @endif 
                        </td> 
                    </tr>
                @endforeach
            </tbody> 
        </table> 
</div>
@endsection