<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @extends('layouts.app')

    @section('content')

        <div class="container">

            <h1 class="mb-4">Dashboard</h1>

            <div class="row">

                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5>Stagiaires</h5>
                            <h2>{{ $totalStagiaires }}</h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5>Stages</h5>
                            <h2>{{ $totalStages }}</h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5>Services</h5>
                            <h2>{{ $totalServices }}</h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5>Stages en cours</h5>
                            <h2>{{ $stagesEnCours }}</h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5>Stages terminés</h5>
                            <h2>{{ $stagesTermines }}</h2>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <h3 class="mt-4">Répartition des stagiaires par service</h3>

            @foreach($repartitionParService as $service)
                <p>
                    {{ $service->nom }} :
                    {{ $service->stagiaires_count }} stagiaire(s)
                </p>
            @endforeach

            <div class="mt-4">
                <h3>Stagiaires par service</h3>
                <canvas id="repartitionChart"></canvas>
            </div>


            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


            <script>
                const services = @json($repartitionParService);
                console.log(services);
            </script>


            <script>

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
            </script>
     
    @endsection
</body>
</html>