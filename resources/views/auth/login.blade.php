<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Connexion</title>

@vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="min-h-screen bg-gray-100 flex items-center justify-center px-4">

<div class="w-full max-w-md">

    <!-- Carte de connexion -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-8">

        <!-- Titre -->
        <div class="text-center mb-8">

            <h1 class="text-3xl font-bold text-gray-900">
                Connexion
            </h1>

            <p class="text-gray-500 mt-2">
                Connectez-vous à votre compte
            </p>

        </div>


        <!-- Erreurs -->
        @if ($errors->any())

            <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">

                <ul class="list-disc list-inside text-red-600 text-sm space-y-1">

                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>

            </div>

        @endif


        <!-- Formulaire -->
        <form action="{{ route('login') }}" method="POST" class="space-y-5">

            @csrf

            <!-- Email -->
            <div>

                <label for="email"
                       class="block text-sm font-medium text-gray-700 mb-2">
                    Email
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autocomplete="email"
                    placeholder="exemple@email.com"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg
                           focus:outline-none focus:ring-2 focus:ring-blue-500
                           focus:border-blue-500">

            </div>


            <!-- Mot de passe -->
            <div>

                <label for="password"
                       class="block text-sm font-medium text-gray-700 mb-2">
                    Mot de passe
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    required
                    autocomplete="current-password"
                    placeholder="••••••••"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg
                           focus:outline-none focus:ring-2 focus:ring-blue-500
                           focus:border-blue-500">

            </div>


            <!-- Bouton -->
            <button
                type="submit"
                class="w-full px-4 py-3 bg-blue-600 hover:bg-blue-700
                       text-white font-semibold rounded-lg
                       shadow-sm transition">

                Se connecter

            </button>

        </form>

    </div>

    <!-- Nom du projet -->
    <p class="text-center text-sm text-gray-500 mt-6">
        Gestion de Stages
    </p>

</div>

</body>

</html>
