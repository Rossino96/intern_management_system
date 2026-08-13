<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Liste des stagiares</h1>

    @foreach ($stagiaires as $stagiaire)
        <table>
            <tr>
                <td>{{ $stagiaire->nom }}</td>
                <td>{{ $stagiaire->prenom }}</td>
                <td>{{ $stagiaire->sexe }}</td>
                <td>{{ $stagiaire->date_naissance }}</td>
                <td>{{ $stagiaire->telephone }}</td>
                <td>{{ $stagiaire->email }}</td>
                <td>{{ $stagiaire->adresse }}</td>
                <td>{{ $stagiaire->etablissement }}</td>
                <td>{{ $stagiaire->filiere }}</td>
                <td>{{ $stagiaire->niveau }}</td>           
                <td><a href="http://127.0.0.1:8000/stagiaires/1/edit">Modifier</a></td>       
                
            </tr>
        </table>
    @endforeach
</body>
</html>
