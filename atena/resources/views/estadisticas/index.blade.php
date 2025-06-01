@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 mt-10 space-y-10">
    <h1 class="text-3xl font-bold text-red-400 text-center">📊 Estadísticas Generales</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
        @php
            $stats = [
                ['valor' => $numOfertas, 'color' => 'red', 'texto' => 'Ofertas activas'],
                ['valor' => $numAlumnosInscritos, 'color' => 'yellow', 'texto' => 'Alumnos inscritos'],
                ['valor' => $numConvenios, 'color' => 'green', 'texto' => 'Convenios activos'],
            ];
        @endphp

        @foreach($stats as $stat)
        <div class="bg-gray-800 rounded-2xl shadow-md p-6 hover:scale-[1.02] transition">
            <div class="text-4xl font-bold text-{{ $stat['color'] }}-400">{{ $stat['valor'] }}</div>
            <p class="mt-2 text-gray-300">{{ $stat['texto'] }}</p>
        </div>
        @endforeach
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div class="bg-gray-800 rounded-2xl shadow-md p-6">
            <h2 class="text-xl font-semibold text-white mb-4">👥 Alumnos por oferta</h2>
            <canvas id="ofertasChart" height="180"></canvas>
        </div>
        <div class="bg-gray-800 rounded-2xl shadow-md p-6">
            <h2 class="text-xl font-semibold text-white mb-4">📈 Ofertas vs Convenios</h2>
            <canvas id="pieChart" height="180"></canvas>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ofertasChart = document.getElementById('ofertasChart').getContext('2d');
    new Chart(ofertasChart, {
        type: 'bar',
        data: {
            labels: {!! $ofertasLabels->toJson() !!},
            datasets: [{
                label: 'Alumnos inscritos',
                data: {!! $ofertasData->toJson() !!},
                backgroundColor: 'rgba(239, 68, 68, 0.7)',
                borderColor: 'rgba(239, 68, 68, 1)',
                borderWidth: 1
            }]
        },
        options: {
            plugins: { legend: { display: false } },
            scales: { y: { beginAtZero: true } }
        }
    });

    const pieChart = document.getElementById('pieChart').getContext('2d');
    new Chart(pieChart, {
        type: 'doughnut',
        data: {
            labels: ['Ofertas', 'Convenios'],
            datasets: [{
                data: [{{ $numOfertas }}, {{ $numConvenios }}],
                backgroundColor: [
                    'rgba(239, 68, 68, 0.7)',
                    'rgba(16, 185, 129, 0.7)'
                ],
                borderColor: [
                    'rgba(239, 68, 68, 1)',
                    'rgba(16, 185, 129, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            plugins: { legend: { position: 'bottom' } }
        }
    });
</script>
@endsection
