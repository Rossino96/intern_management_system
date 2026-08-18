<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Modifer un stage</h1>
        @if ($errors->any())
            @foreach ( $errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        @endif


    <form action="/stages/{{ $stage->id }}" method="POST">
        @csrf
        @method ('PUT')

            <select name="stagiaire_id">
                @foreach ($stagiaires as $stagiaire)
                    <option value="{{ $stagiaire->id }}"
                        {{ $stage->stagiaire_id == $stagiaire->id ? 'selected' : '' }}>
                        {{ $stagiaire->nom }} {{ $stagiaire->prenom }}
                    </option>
                @endforeach
            </select>

            <select name="service_id">
                @foreach ($services as $service)
                    <option value="{{ $service->id }}"
                        {{ $stage->service_id == $service->id ? 'selected' : '' }}>
                        {{ $service->nom }}
                    </option>
                @endforeach
            </select>

        <input type="date" name="date_debut" value="{{$stage->date_debut}}">
        <input type="date" name="date_fin" value="{{$stage->date_fin}}">
        <input type="text" name="statut" value="{{$stage->statut}}">
        <input type="text" name="theme" value="{{$stage->theme}}">

        <button type="submit">Modifier</button>
    </form>
</body>
</html>