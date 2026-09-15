<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestion de Stages')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav class="app-nav">
        <div class="nav-inner">
            <a class="brand" href="{{ route('dashboard') }}">Gestion de Stages</a>

            @auth
                <div class="nav-links">
                    <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                    <a class="nav-link" href="{{ route('stagiaires.index') }}">Stagiaires</a>
                    <a class="nav-link" href="{{ route('stages.index') }}">Stages</a>
                    @if(in_array(auth()->user()->role, ['admin', 'rh']))
                        <a class="nav-link" href="{{ route('services.index') }}">Services</a>
                    @endif
                    @if(auth()->user()->role === 'admin')
                        <a class="nav-link" href="{{ route('users.index') }}">Utilisateurs</a>
                    @endif
                </div>
                <div class="nav-user">
                    <span class="nav-link">{{ auth()->user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-danger" type="submit">Déconnexion</button>
                    </form>
                </div>
                <button class="nav-toggle" type="button" data-nav-toggle aria-label="Ouvrir le menu">☰</button>
            @endauth
        </div>

        @auth
            <div class="mobile-menu" data-mobile-menu>
                <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                <a class="nav-link" href="{{ route('stagiaires.index') }}">Stagiaires</a>
                <a class="nav-link" href="{{ route('stages.index') }}">Stages</a>
                @if(in_array(auth()->user()->role, ['admin', 'rh']))
                    <a class="nav-link" href="{{ route('services.index') }}">Services</a>
                @endif
                @if(auth()->user()->role === 'admin')
                    <a class="nav-link" href="{{ route('users.index') }}">Utilisateurs</a>
                @endif
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-danger" type="submit">Déconnexion</button>
                </form>
            </div>
        @endauth
    </nav>

    <main class="app-main">
        @yield('content')
    </main>

    @stack('scripts')
</body>
</html>
