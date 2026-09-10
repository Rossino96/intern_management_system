@extends('layouts.app')

@section('title', 'Liste des services')

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

        <h1>Liste des services</h1>       

        <div>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                ← Dashboard
            </a>

            @if(in_array(auth()->user()->role, ['admin', 'rh'])) 
                    <a href="{{ route('services.create') }}" class="btn btn-primary"> 
                    <i class="fas fa-user-plus"></i>
                    Ajouter un service 
                </a> 
            @endif
        </div>

    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <td>nom du service</td>
                <td>Description</td>
                <td>Actions</td>
            </tr>
        </thead>

        <tbody>

            @foreach ($services as $service)
            <tr>
                <td>{{$service->nom}}</td>
                <td>{{$service->description}}</td>

                <td> 
                    @if(in_array(auth()->user()->role, ['admin', 'rh'])) 
                        <a href="{{ route('services.edit', $service->id) }}"
                            class="btn btn-warning btn-sm"> 
                            Modifier 
                        </a> 
                    
                        <form action="{{ route('services.destroy', $service->id) }}" 
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
                    @endif
                </td>
            </tr>
        </tbody>
    @endforeach
@endsection