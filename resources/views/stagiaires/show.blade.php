@extends('layouts.app')

@section('title', 'Information stagiaire')

@section('content')

    <h1>Information du stagiaire</h1>

    <a href="{{ route('stagiaires.index') }}" class="btn btn-secondary">
        ← Retour aux stagiaires
    </a>

    <table class="table table-bordered table-striped"> 
            <thead class="table-dark">
                <tr>
                    <td>Detail du stagiaire</td>
                </tr>
            </thead>

            <tbody>
                
                <tr>
                    <td>Nom</td>
                    <td>{{ $stagiaire->nom }}</td>  
                </tr>    
                <tr>
                    <td>prenom</td>
                    <td>{{ $stagiaire->prenom }}</td>  
                </tr>    
                <tr>
                    <td>sexe</td>
                    <td>{{ $stagiaire->sexe }}</td>  
                </tr>    
                <tr>
                    <td>date_naissance</td>
                    <td>{{ $stagiaire->date_naissance }}</td>  
                </tr>    
                <tr>
                    <td>telephone</td>
                    <td>{{ $stagiaire->telephone }}</td>  
                </tr>    
                <tr>
                    <td>email</td>
                    <td>{{ $stagiaire->email }}</td>  
                </tr>    
                <tr>
                    <td>adresse</td>
                    <td>{{ $stagiaire->adresse }}</td>  
                </tr>    
                <tr>
                    <td>etablissement</td>
                    <td>{{ $stagiaire->etablissement }}</td>  
                </tr>    
                <tr>
                    <td>filiere</td>
                    <td>{{ $stagiaire->filiere }}</td>  
                </tr>    
                <tr>
                    <td>niveau</td>
                    <td>{{ $stagiaire->niveau }}</td>  
                </tr>    
                <tr>
                    <td>stages_count</td>
                    <td>{{ $stagiaire->stages_count }}</td>  
                </tr>    
            
            </tbody>
    </table>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <td>stage associe</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($stagiaire->stages as $stage)
                <tr>
                    <td>Date de debut</td>
                    <td> {{$stage->date_debut }}</td>
                </tr>
                <tr>
                    <td>Date de fin</td>
                    <td> {{$stage->date_fin }}</td>
                </tr>
                <tr>
                    <td>Statut</td>
                    <td>{{ $stage->statut }}</td>
                </tr>
                <tr>
                    <td>theme</td>
                    <td>{{ $stage->theme }}</td>
                </tr>
                <tr>
                    <td>service</td>
                    <td>{{ $stage->service->nom}}</td>
                </tr>
                <tr>
                    <td>encadrant</td>
                    <td>{{ $stage->encadrant->name }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection