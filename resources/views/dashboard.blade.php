@extends('layouts.admin', ['title' => 'Dashboard'])

@section('content-header')
    <div class="row">
        <h1><i class="fas fa-tachometer-alt"></i> Dashboard</h1>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row" style="gap: 5%; padding: 3% 2%;">
            <div class="card col">
                <div class="card-body">
                    <h1>Chart Invoice</h1>
                    <canvas id="chartKamarDashboard" width="500" height="300"></canvas>
                </div>
            </div>
            <div class="card col">
                <div class="card-body">
                    <h1>Chart User</h1>
                    <canvas id="chartAdminRole" width="500" height="300"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var namaKamarsDashboard = @json($namaKamars ?? []);
        var jumlahKamarsDashboard = @json($jumlahKamars ?? []);
        var jumlahKamarsDibatalkanDashboard = @json($jumlahKamarsDibatalkan ?? []);
    
        var ctxDashboard = document.getElementById('chartKamarDashboard').getContext('2d');
        var myChartDashboard = new Chart(ctxDashboard, {
            type: 'bar',
            data: {
                labels: namaKamarsDashboard,
                datasets: [{
                    label: 'Jumlah Kamar Checkout',
                    data: jumlahKamarsDashboard,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    barThickness: 50
                },
                {
                    label: 'Jumlah Kamar Dibatalkan',
                    data: jumlahKamarsDibatalkanDashboard,
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1,
                    barThickness: 50
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: false,
                        min: 1,
                        max: 60,
                        ticks: {
                            stepSize: 2
                        }
                    }
                }
            }
        });

        var adminRoles = @json($admins ?? []);
        var ctxAdminRole = document.getElementById('chartAdminRole').getContext('2d');
        var myChartAdminRole = new Chart(ctxAdminRole, {
            type: 'pie',
            data: {
                labels: Object.keys(adminRoles),
                datasets: [{
                    data: Object.values(adminRoles),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                    ],
                    borderWidth: 1,
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: false,
                aspectRatio: 1,
            }
        });
    </script>
@endsection
