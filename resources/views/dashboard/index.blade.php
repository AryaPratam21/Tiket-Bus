@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <h1 class="mb-4">Dashboard Penjualan Tiket Bus</h1>

    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card">
                <div class="card-header">
                    Statistik Penjualan Tiket
                </div>
                <div class="card-body">
                    <h5 class="card-title">Total Penjualan</h5>
                    <p class="card-text display-4">{{ $totalPenjualan }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    Grafik Penjualan Bulanan
                </div>
                <div class="card-body">
                    <canvas id="penjualanBulananChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('penjualanBulananChart').getContext('2d');
    var penjualanBulananChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($penjualanBulanan->pluck('bulan')) !!},
            datasets: [{
                label: 'Penjualan Bulanan',
                data: {!! json_encode($penjualanBulanan->pluck('total')) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endpush
