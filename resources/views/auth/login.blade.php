<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="auth-page">
    <div class="card auth-card">
        <div class="auth-logo">GS</div>
        <h1 class="auth-title">Connexion</h1>
        <p class="auth-subtitle">Accédez à votre espace de gestion des stages.</p>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="form-grid">
            @csrf
            <div class="form-group full">
                <label class="form-label" for="email">Email</label>
                <input class="form-control" type="email" id="email" name="email" value="{{ old('email') }}" autocomplete="email" required>
            </div>
            <div class="form-group full">
                <label class="form-label" for="password">Mot de passe</label>
                <input class="form-control" type="password" id="password" name="password" autocomplete="current-password" required>
            </div>
            <div class="form-group full">
                <button class="btn btn-primary" type="submit">Se connecter</button>
            </div>
        </form>
        <div class="auth-footer">Gestion de Stages</div>
    </div>
</body>
</html>
