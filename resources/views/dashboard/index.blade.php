@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="space-y-8">

{{-- En-tête --}}
<div>
    <h1 class="text-3xl font-bold text-gray-900">
        Dashboard
    </h1>

    <p class="mt-1 text-gray-500">
        Vue d'ensemble de la gestion des stages
    </p>
</div>


{{-- Cartes statistiques --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">

    {{-- Stagiaires --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6
                hover:shadow-md transition">
        <p class="text-sm font-medium text-gray-500">
            Stagiaires
        </p>

        <p class="mt-2 text-3xl font-bold text-blue-600">
            {{ $totalStagiaires }}
        </p>

        <p class="mt-1 text-sm text-gray-400">
            Stagiaires enregistrés
        </p>
    </div>


    {{-- Stages --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6
                hover:shadow-md transition">
        <p class="text-sm font-medium text-gray-500">
            Stages
        </p>

        <p class="mt-2 text-3xl font-bold text-indigo-600">
            {{ $totalStages }}
        </p>

        <p class="mt-1 text-sm text-gray-400">
            Stages enregistrés
        </p>
    </div>


    {{-- Services --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6
                hover:shadow-md transition">
        <p class="text-sm font-medium text-gray-500">
            Services
        </p>

        <p class="mt-2 text-3xl font-bold text-emerald-600">
            {{ $totalServices }}
        </p>

        <p class="mt-1 text-sm text-gray-400">
            Services disponibles
        </p>
    </div>


    {{-- Stages en cours --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6
                hover:shadow-md transition">
        <p class="text-sm font-medium text-gray-500">
            Stages en cours
        </p>

        <p class="mt-2 text-3xl font-bold text-amber-500">
            {{ $stagesEnCours }}
        </p>

        <p class="mt-1 text-sm text-gray-400">
            Actuellement en cours
        </p>
    </div>


    {{-- Stages terminés --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6
                hover:shadow-md transition">
        <p class="text-sm font-medium text-gray-500">
            Stages terminés
        </p>

        <p class="mt-2 text-3xl font-bold text-green-600">
            {{ $stagesTermines }}
        </p>

        <p class="mt-1 text-sm text-gray-400">
            Stages achevés
        </p>
    </div>

</div>


{{-- Répartition des stagiaires --}}
<div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">

    <h2 class="text-xl font-semibold text-gray-900">
        Répartition des stagiaires par service
    </h2>

    <div class="mt-5 space-y-3">

        @foreach($repartitionParService as $service)

            <div class="flex items-center justify-between
                        bg-gray-50 rounded-lg px-4 py-3">

                <span class="text-gray-700">
                    {{ $service->nom }}
                </span>

                <span class="font-semibold text-blue-600">
                    {{ $service->stagiaires_count }} stagiaire(s)
                </span>

            </div>

        @endforeach

    </div>

</div>


{{-- Graphique stagiaires par service --}}
<div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">

    <h2 class="text-xl font-semibold text-gray-900">
        Stagiaires par service
    </h2>

    <div class="mt-5">
        <canvas id="repartitionChart"></canvas>
    </div>

</div>


{{-- Graphique stages par mois --}}
<div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">

    <h2 class="text-xl font-semibold text-gray-900">
        Stages par mois
    </h2>

    <div class="mt-5">
        <canvas id="stagesMoisChart"></canvas>
    </div>

</div>


{{-- Stagiaires avec plusieurs stages --}}
<div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">

    <h2 class="text-xl font-semibold text-gray-900">
        Stagiaires ayant plusieurs stages
    </h2>

    <div class="mt-5 space-y-3">

        @forelse($stagiairesMultiplesStages as $stagiaire)

            <div class="flex items-center justify-between
                        bg-gray-50 rounded-lg px-4 py-3">

                <span class="text-gray-700">
                    {{ $stagiaire->nom }} {{ $stagiaire->prenom }}
                </span>

                <span class="font-semibold text-indigo-600">
                    {{ $stagiaire->stages_count }} stages
                </span>

            </div>

        @empty

            <p class="text-gray-500">
                Aucun stagiaire n'a plusieurs stages.
            </p>

        @endforelse

    </div>

</div>


{{-- Services les plus demandés --}}
<div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">

    <h2 class="text-xl font-semibold text-gray-900">
        Services les plus demandés
    </h2>

    <div class="mt-5 space-y-3">

        @foreach($topServices as $service)

            <div class="flex items-center justify-between
                        bg-gray-50 rounded-lg px-4 py-3">

                <span class="text-gray-700">
                    {{ $service->nom }}
                </span>

                <span class="font-semibold text-emerald-600">
                    {{ $service->stages_count }} stage(s)
                </span>

            </div>

        @endforeach

    </div>

</div>
```

</div>

{{-- Chart.js --}}

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

    const services = @json($repartitionParService);

    const nomsServices = services.map(service => service.nom);
    const nombresStagiaires = services.map(service => service.stagiaires_count);

    new Chart(document.getElementById('repartitionChart'), {
        type: 'bar',

        data: {
            labels: nomsServices,

            datasets: [{
                label: 'Nombre de stagiaires',
                data: nombresStagiaires
            }]
        }
    });


    const stagesParMois = @json($stagesParMois);

    const mois = stagesParMois.map(stage => stage.mois);
    const totalStages = stagesParMois.map(stage => stage.total);

    new Chart(document.getElementById('stagesMoisChart'), {
        type: 'line',

        data: {
            labels: mois,

            datasets: [{
                label: 'Nombre de stages',
                data: totalStages
            }]
        }
    });

</script>

@endsection
