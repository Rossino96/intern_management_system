<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Liste des services</h1>

    <table>
        <tr>
            <td>nom du service</td>
            <td>Description</td>
        </tr>
        @foreach ($services as $service)
        <tr>
            <td>{{$service->nom}}</td>
            <td>{{$service->description}}</td>
            <td><a href="http://127.0.0.1:8000/services/1/edit">Modifier</a></td>
            <td>
                <form action="/services/{{ $service->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
    @endforeach
</body>
</html>