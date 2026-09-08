@extends('layouts.app')

@section('title', 'Liste des services')

@section('content')
    <h1>Liste des services</h1>

    @if(in_array(auth()->user()->role, ['admin', 'rh'])) 
        <a href="{{ route('services.create') }}" class="btn btn-primary"> 
            <i class="fas fa-user-plus"></i>
            Ajouter un service 
        </a> 
    @endif

    <table>
        <tr>
            <td>nom du service</td>
            <td>Description</td>
        </tr>
        @foreach ($services as $service)
        <tr>
            <td>{{$service->nom}}</td>
            <td>{{$service->description}}</td>

            @if(in_array(auth()->user()->role, ['admin', 'rh'])) 
                <td> 
                    <a href="{{ route('services.edit', $service->id) }}"
                        class="btn btn-warning btn-sm"> 
                        Modifier 
                    </a> 
                </td>
                <td> 
                    <form action="{{ route('services.destroy', $service->id) }}" method="POST"> 
                        @csrf @method('DELETE') 
                        <button type="submit"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Voulez-vous vraiment supprimer cet élément ?')">
                            Supprimer
                        </button> 
                    </form> 
                </td>
            @endif
        </tr>
    @endforeach
@endsection