<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Modifier un stagiaire</h1>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        @endif

    <form action="/stagiaires/{{ $stagiaire->id }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="nom" value="{{ $stagiaire->nom }}">
        <input type="text" name="prenom" value="{{ $stagiaire->prenom }}">
        <input type="text" name="date_naissance" value="{{ $stagiaire->date_naissance }}">
        <input type="text" name="telephone" value="{{ $stagiaire->telephone }}">
        <input type="text" name="email" value="{{ $stagiaire->email }}">
        <input type="text" name="adresse" value="{{ $stagiaire->adresse }}">
        <input type="text" name="etablissement" value="{{ $stagiaire->etablissement }}">
        <input type="text" name="filiere" value="{{ $stagiaire->filiere }}">
        <input type="text" name="niveau" value="{{ $stagiaire->niveau }}">

        <button type="submit">Modifier</button>
    </form>
</form>
</body>
</html> 