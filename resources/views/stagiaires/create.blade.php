<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ajouter un stagiaire</h1>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        @endif

    <form action="/stagiaires" method="POST">
        @csrf

        <input type="text" name="nom" placeholder="Nom">
        <input type="text" name="prenom" placeholder="Prénom">
        <input type="text" name="sexe" placeholder="Sexe">
        <input type="text" name="date_naissance" placeholder="date_naissance">
        <input type="text" name="telephone" placeholder="telephone">
        <input type="text" name="email" placeholder="email">
        <input type="text" name="adresse" placeholder="adresse">
        <input type="text" name="etablissement" placeholder="etablissement">
        <input type="text" name="filiere" placeholder="filiere">
        <input type="text" name="niveau" placeholder="niveau">

        <button type="submit">Enregistrer</button>
    </form>
</body>
</html>