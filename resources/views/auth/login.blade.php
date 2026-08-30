<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Connexion</h1> 

    @if ($errors->any()) 
        <div> 
            @foreach ($errors->all() as $error) 
                <p>
                    {{ $error }}
                </p> 
            @endforeach 
        </div> 
    @endif 
    
    <form action="{{ route('login') }}" method="POST">

        @csrf 
        <div> 
            <label for="email">Email :</label> 
            <input type="email" id="email" name="email" required> 
        </div> 

        <div> 
            <label for="password">Mot de passe :</label> 
            <input type="password" id="password" name="password" required> 
        </div> 
        
        <button type="submit">Se connecter</button> </form>
</body>
</html>