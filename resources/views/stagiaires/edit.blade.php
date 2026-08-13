<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Modifier un stagiaire</h1>

    <form action="/stagiaires/{{ $stagiaire->id }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="nom" value="{{ $stagiaire->nom }}">
        <input type="text" name="prenom" value="{{ $stagiaire->prenom }}">

        <button type="submit">Modifier</button>
    </form>
</form>
</body>
</html> 