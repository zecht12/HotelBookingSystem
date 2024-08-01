@extends('layouts.admin', ['title'=>'Invoice'])
@section('content-header')
    <div class="row">
        <h1><i class='fas fa-file-invoice' style='font-size:24px'></i> Invoice</h1>
    </div>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <h1>Daftar Invoice</h1>
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Nama Pemesan</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                            <th>Nama Kamar</th>
                            <th>Jumlah Kamar</th>
                            <th>Total Harga Kamar</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($invoices as $invoice)
                            <tr>
                                <td>{{ $invoice->namaPemesan }}</td>
                                <td>{{ $invoice->checkIn }}</td>
                                <td>{{ $invoice->checkOut }}</td>
                                <td>{{ $invoice->nama_kamar }}</td>
                                <td>{{ $invoice->jumlahKamar }}</td>
                                <td>{{ $invoice->totalHarga }}</td>
                                <td>{{ $invoice->status }}</td>
                                <td>
                                    @if($invoice->status == 'Berhasil Di checkout tapi belum di checkIn')
                                        <form action="{{ route('invoices.cancel', $invoice->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Batalkan Pesanan</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h1>Chart Invoice</h1>
            <canvas id="chartKamar" width="500" height="300"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('chartKamar').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($namaKamars),
                datasets: [{
                    label: 'Jumlah Kamar Checkout',
                    data: @json($jumlahKamars),
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    barThickness: 70
                },
                {
                    label: 'Jumlah Kamar Dibatalkan',
                    data: @json($jumlahKamarsDibatalkan),
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1,
                    barThickness: 70
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
    </script>

@endsection
