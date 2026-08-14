<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ajouter Service</h1>
        @if ($errors->any())
            @foreach($errors->all as $error)
                <p>{{ $error }}</p>
            @endforeach
        @endif

    <form action="/services" method="POST">
        @csrf

        
        <input type="text" name="nom" placeholder="Nom">
        <input type="text" name="description" placeholder="description">
    


        <button type="submit">Enregistrer</button>
    </form>
</body>
</html>        