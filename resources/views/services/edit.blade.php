<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Modifer un service</h1>
        @if ($errors->any())
            @foreach ( $errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        @endif


    <form action="/services/{{ $service->id }}" method="POST">
        @csrf
        @method ('PUT')

        <input type="text" name="nom" value="{{$service->nom}}">
        <input type="text" name="description" value="{{$service->description}}">

        <button type="submit">Modifier</button>
    </form>
</body>
</html>