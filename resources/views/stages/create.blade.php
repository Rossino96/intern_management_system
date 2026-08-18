<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ajouter Stage</h1>
        @if ($errors->any())
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        @endif

        
        <form action="/stages" method="POST">
            @csrf
            
            <select name="stagiaire_id">
                @foreach ($stagiaires as $stagiaire)
                    <option value="{{ $stagiaire->id }}">
                        {{ $stagiaire->nom }} {{ $stagiaire->prenom }}
                    </option>
                @endforeach
            </select>

            <select name="service_id">
                @foreach ($services as $service)
                    <option value="{{ $service->id }}">
                        {{ $service->nom }}
                    </option>
                @endforeach
            </select>
        
        <input type="date" name="date_debut" placeholder="date_debut">
        <input type="date" name="date_fin" placeholder="date_fin">
        <input type="text" name="statut" placeholder="statut">
        <input type="text" name="theme" placeholder="theme">

        <button type="submit">Enregistrer</button>
        <p>Stagiaire sélectionné : {{ request('stagiaire_id') }}</p></form>
</body>
</html>