@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div>
    <div class="page-head">
        <div>
            <h1 class="page-title">
                Dashboard
            </h1>
            <p class="page-subtitle">
                Vue d'ensemble de la gestion des stages
            </p>
        </div>
    </div>

    <div class="stats-grid">
        <div class="card stat-card">
            <div class="stat-label">
                Stagiaires   
            </div>
            <div class="stat-value" style="color:#2563eb">
                {{ $totalStagiaires }}
            </div>
            <div class="stat-note">
                Stagiaires enregistrés
            </div>
        </div>

        <div class="card stat-card">
            <div class="stat-label">
                Stages
            </div>
            <div class="stat-value" style="color:#4f46e5">
                {{ $totalStages }}
            </div><div class="stat-note">
                Stages enregistrés
            </div>
        </div>

        <div class="card stat-card">
            <div class="stat-label">
                Services
            </div>
            <div class="stat-value" style="color:#059669">
                {{ $totalServices }}
            </div>
            <div class="stat-note">
                Services disponibles
            </div>
        </div>

        <div class="card stat-card">
            <div class="stat-label">
                Stages en cours
            </div>
            <div class="stat-value" style="color:#d97706">
                {{ $stagesEnCours }}
            </div>
            <div class="stat-note">
                Actuellement en cours
            </div>
        </div>

        <div class="card stat-card">
            <div class="stat-label">
                Stages terminés
            </div>
            <div class="stat-value" style="color:#16a34a">
                {{ $stagesTermines }}
            </div>
            <div class="stat-note">
                Stages achevés
            </div>
        </div>
    </div>

    <div class="dashboard-grid" style="margin-top:18px">
        <section class="card card-body">
            <h2 class="section-title">Répartition des stagiaires par service</h2>
            <div class="list">
                @forelse($repartitionParService as $service)
                    <div class="list-row">
                        <span>
                            {{ $service->nom }}
                        </span>
                        <strong style="color:#2563eb">
                            {{ $service->stagiaires_count }}
                            stagiaire(s)
                        </strong>
                    </div>
                @empty
                    <p class="muted">Aucune donnée disponible.</p>
                @endforelse
            </div>
        </section>

        <section class="card card-body">
            <h2 class="section-title">Stagiaires ayant plusieurs stages</h2>
            <div class="list">
                @forelse($stagiairesMultiplesStages as $stagiaire)
                    <div class="list-row">
                        <span>
                            {{ $stagiaire->nom }} {{ $stagiaire->prenom }}
                        </span>
                        <strong style="color:#4f46e5">
                            {{ $stagiaire->stages_count }} stage(s)
                        </strong>
                    </div>
                @empty
                    <p class="muted">Aucun stagiaire n'a plusieurs stages.</p>
                @endforelse
            </div>
        </section>

        <section class="card card-body">
            <h2 class="section-title">Services les plus demandés</h2>
            <div class="list">
                @forelse($topServices as $service)
                    <div class="list-row">
                        <span>
                            {{ $service->nom }}
                        </span>
                        <strong style="color:#059669">
                            {{ $service->stages_count }} 
                            stage(s)
                        </strong>
                    </div>
                @empty
                    <p class="muted">Aucune donnée disponible.</p>
                @endforelse
            </div>
        </section>

        <section class="card card-body">
            <h2 class="section-title">Stagiaires par service</h2>
            <canvas id="repartitionChart"></canvas>
        </section>

        <section class="card card-body dashboard-full">
            <h2 class="section-title">Stages par mois</h2>
            <canvas id="stagesMoisChart"></canvas>
        </section>
    </div>
</div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const services = @json($repartitionParService);
        new Chart(document.getElementById('repartitionChart'), {
            type: 'bar',
            data: { labels: services.map(s => s.nom), datasets: [{ label: 'Nombre de stagiaires', data: services.map(s => s.stagiaires_count) }] },
            options: { responsive: true, plugins: { legend: { display: false } } }
        });
        const stagesParMois = @json($stagesParMois);
        new Chart(document.getElementById('stagesMoisChart'), {
            type: 'line',
            data: { labels: stagesParMois.map(s => s.mois), datasets: [{ label: 'Nombre de stages', data: stagesParMois.map(s => s.total), tension: .35 }] },
            options: { responsive: true }
        });
    </script>
@endpush
