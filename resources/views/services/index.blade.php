<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Liste des services</h1>

    @foreach ($services as $service)
    <table>
        <tr>
            <td>{{$service->nom}}</td>
            <td>{{$service->description}}</td>
        </tr>
    @endforeach
</body>
</html>