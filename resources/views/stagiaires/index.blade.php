@extends('layouts.app')

@section('title', 'Liste des stagiaires')

@section('content')

    <h1>Liste des stagiaires</h1> 
    @if(in_array(auth()->user()->role, ['admin', 'rh'])) 
        <a href="{{ route('stagiaires.create') }}" class="btn btn-primary"> 
            <i class="fas fa-user-plus"></i>
            Ajouter un stagiaire 
        </a> @endif 
    @foreach ($stagiaires as $stagiaire) 
        <table> 
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
                @if(in_array(auth()->user()->role, ['admin', 'rh'])) 
                    <td> 
                        <a href="{{ route('stagiaires.edit', $stagiaire->id) }}"
                        class="btn btn-warning btn-sm">
                            Modifier 
                        </a> 
                    </td> 
                    <td> 
                        <form action="{{ route('stagiaires.destroy', $stagiaire->id) }}" method="POST"> @csrf @method('DELETE') 
                            <button type="submit"
                            class="btn btn-danger btn-sm"
                                onclick="return confirm('Voulez-vous vraiment supprimer ce stage ?')">
                                Supprimer
                            </button> 
                        </form> 
                    </td> 
                @endif 
            </tr> 
        </table> 
    @endforeach
@endsection