@extends('layouts.app')

@section('title', 'Modifier un stagiaire')

@section('content')

<div class="max-w-3xl mx-auto">

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        @endif

        <!-- En-tête -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">
                Modifier un stagiaire
            </h1>
            <p class="text-gray-500 mt-1">
                Modifier les informations du stagiaire.
            </p>
        </div>

        <a href="{{ route('stagiaires.index') }}"
           class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium rounded-lg transition">
            ← Retour
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">

        <form action="/stagiaires/{{ $stagiaire->id }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <!-- Nom / Prénom -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                <div>
                    <label for="nom" class="block text-sm font-medium text-gray-700 mb-2">
                        Nom
                    </label>

                    <input type="text"
                           id="nom"
                           name="nom"
                           value="{{ $stagiaire->nom }}"
                           placeholder="Ex : Rakoto"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg
                                  focus:outline-none focus:ring-2 focus:ring-blue-500
                                  focus:border-blue-500">
                </div>

                 <div>
                    <label for="prenom" class="block text-sm font-medium text-gray-700 mb-2">
                        Prénom
                    </label>

                    <input type="text"
                           id="prenom"
                           name="prenom"
                           value="{{ $stagiaire->prenom }}"
                           placeholder="Ex : Jean"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg
                                  focus:outline-none focus:ring-2 focus:ring-blue-500
                                  focus:border-blue-500">
                </div>
            </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label for="sexe" class="block text-sm font-medium text-gray-700 mb-2">
                            Sexe
                        </label>

                        <select id="sexe"
                                name="sexe"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg
                                    focus:outline-none focus:ring-2 focus:ring-blue-500
                                    focus:border-blue-500">

                            <option value="">Sélectionner</option>
                            <option value="Homme" {{ old('sexe') == 'Homme' ? 'selected' : '' }}>
                                Homme
                            </option>
                            <option value="Femme" {{ old('sexe') == 'Femme' ? 'selected' : '' }}>
                                Femme
                            </option>

                        </select>
                    </div>

                    <div>
                        <label for="date_naissance" class="block text-sm font-medium text-gray-700 mb-2">
                            Date de naissance
                        </label>

                        <input type="date"
                            id="date_naissance"
                            name="date_naissance"
                            value="{{ $stagiaire->date_naissance  }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg
                                    focus:outline-none focus:ring-2 focus:ring-blue-500
                                    focus:border-blue-500">
                    </div>
                </div>

            <!-- Téléphone / Email -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                <div>
                    <label for="telephone" class="block text-sm font-medium text-gray-700 mb-2">
                        Téléphone
                    </label>

                    <input type="tel"
                           id="telephone"
                           name="telephone"
                           value="{{ $stagiaire->telephone }}"
                           placeholder="Ex : 034 12 345 67"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg
                                  focus:outline-none focus:ring-2 focus:ring-blue-500
                                  focus:border-blue-500">
                </div>


                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                        Email
                    </label>

                    <input type="email"
                           id="email"
                           name="email"
                           value="{{ $stagiaire->email }}"
                           placeholder="Ex : jean@email.com"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg
                                  focus:outline-none focus:ring-2 focus:ring-blue-500
                                  focus:border-blue-500">
                </div>

            </div>


            <!-- Adresse -->
            <div>
                <label for="adresse" class="block text-sm font-medium text-gray-700 mb-2">
                    Adresse
                </label>

                <textarea id="adresse"
                          name="adresse"
                          rows="3"
                          placeholder="Adresse du stagiaire"
                          class="w-full px-4 py-3 border border-gray-300 rounded-lg
                                 focus:outline-none focus:ring-2 focus:ring-blue-500
                                 focus:border-blue-500">{{ $stagiaire->adresse  }}</textarea>
            </div>


            <!-- Établissement / Filière -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                <div>
                    <label for="etablissement" class="block text-sm font-medium text-gray-700 mb-2">
                        Établissement
                    </label>

                    <input type="text"
                           id="etablissement"
                           name="etablissement"
                           value="{{ $stagiaire->etablissement }}"
                           placeholder="Ex : Université d'Antananarivo"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg
                                  focus:outline-none focus:ring-2 focus:ring-blue-500
                                  focus:border-blue-500">
                </div>


                <div>
                    <label for="filiere" class="block text-sm font-medium text-gray-700 mb-2">
                        Filière
                    </label>

                    <input type="text"
                           id="filiere"
                           name="filiere"
                           value="{{ $stagiaire->filiere }}"
                           placeholder="Ex : Informatique"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg
                                  focus:outline-none focus:ring-2 focus:ring-blue-500
                                  focus:border-blue-500">
                </div>

            </div>


            <!-- Niveau -->
            <div>
                <label for="niveau" class="block text-sm font-medium text-gray-700 mb-2">
                    Niveau
                </label>

                <input type="text"
                       id="niveau"
                       name="niveau"
                       value="{{ $stagiaire->niveau }}"
                       placeholder="Ex : L3"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg
                              focus:outline-none focus:ring-2 focus:ring-blue-500
                              focus:border-blue-500">
            </div>


            <!-- Bouton -->
            <div class="flex justify-end pt-4 border-t border-gray-200">

                <button type="submit"
                        class="px-6 py-3 bg-blue-600 hover:bg-blue-700
                               text-white font-semibold rounded-lg
                               shadow-sm transition">
                    Modifier le stagiaire
                </button>

            </div>
        </form>
    </div>
@endsection