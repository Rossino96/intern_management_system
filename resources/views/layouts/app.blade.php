<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>@yield('title', 'Gestion de Stages')</title>

@vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-gray-100 text-gray-800">

<nav class="bg-gray-900 text-white shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex items-center justify-between h-16">

            {{-- Logo / nom de l'application --}}
            <a href="{{ route('dashboard') }}"
               class="text-xl font-bold tracking-wide hover:text-blue-400 transition">
                Gestion Stages
            </a>

            {{-- Navigation --}}
            @auth
                <div class="hidden md:flex items-center gap-2">

                    {{-- Dashboard --}}
                    <a href="{{ route('dashboard') }}"
                       class="px-3 py-2 rounded-lg text-sm font-medium hover:bg-gray-800 hover:text-blue-400 transition">
                        Dashboard
                    </a>

                    {{-- Stagiaires --}}
                    <a href="{{ route('stagiaires.index') }}"
                       class="px-3 py-2 rounded-lg text-sm font-medium hover:bg-gray-800 hover:text-blue-400 transition">
                        Stagiaires
                    </a>

                    {{-- Stages --}}
                    <a href="{{ route('stages.index') }}"
                       class="px-3 py-2 rounded-lg text-sm font-medium hover:bg-gray-800 hover:text-blue-400 transition">
                        Stages
                    </a>

                    {{-- Services : Admin + RH --}}
                    @if(in_array(auth()->user()->role, ['admin', 'rh']))
                        <a href="{{ route('services.index') }}"
                           class="px-3 py-2 rounded-lg text-sm font-medium hover:bg-gray-800 hover:text-blue-400 transition">
                            Services
                        </a>
                    @endif

                    {{-- Utilisateurs : Admin uniquement --}}
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('users.index') }}"
                           class="px-3 py-2 rounded-lg text-sm font-medium hover:bg-gray-800 hover:text-blue-400 transition">
                            Utilisateurs
                        </a>
                    @endif

                </div>
            @endauth

            {{-- Déconnexion --}}
            @auth
                <form action="{{ route('logout') }}" method="POST">
                    @csrf

                    <button type="submit"
                            class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-lg transition">
                        Déconnexion
                    </button>
                </form>
            @endauth

        </div>
    </div>
</nav>

{{-- Contenu des pages --}}
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    @yield('content')
</main>

@stack('scripts')

</body>
</html>
