<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Liste des stages</h1>

    <table>
        @foreach ($stages as $stage)
            <tr>
                <td>{{$stage->date_debut}}</td>
                <td>{{$stage->date_fin}}</td>
                <td>{{$stage->statut}}</td>
                <td>{{$stage->theme}}</td>
                <td><a href="http://127.0.0.1:8000/stages/1/edit">Modifier</a></td>
                <td>
                    <form action="/stages/{{ $stage->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>