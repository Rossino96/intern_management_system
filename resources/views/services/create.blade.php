@extends('layouts.app')

@section('title', 'Ajouter un service')

@section('content')
    <h1>Ajouter Service</h1>
        @if ($errors->any())
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        @endif

    <a href="{{ route('services.index') }}" class="btn btn-secondary">
        ← Retour aux services
    </a>

    <form action="/services" method="POST">
        @csrf

        
        <input type="text" name="nom" placeholder="Nom">
        <input type="text" name="description" placeholder="description">


        <button type="submit">Enregistrer</button>
    </form>
@endsection