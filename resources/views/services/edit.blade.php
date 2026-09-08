@extends('layouts.app')

@section('title', 'Modifier un service')

@section('content')
    <h1>Modifer un service</h1>
        @if ($errors->any())
            @foreach ( $errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        @endif

    <a href="{{ route('services.index') }}" class="btn btn-secondary">
        ← Retour aux services
    </a>


    <form action="/services/{{ $service->id }}" method="POST">
        @csrf
        @method ('PUT')

        <input type="text" name="nom" value="{{$service->nom}}">
        <input type="text" name="description" value="{{$service->description}}">

        <button type="submit">Modifier</button>
    </form>
@endsection