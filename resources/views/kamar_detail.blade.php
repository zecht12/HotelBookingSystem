@extends('layouts.detail', ['title' => $kamar->nama_kamar])

@section('content')
    <div>
        <img src="{{ asset('/images/kamar/' . $kamar->foto_kamar) }}" class="img-fluid rounded kamar-image" style="width: 100%; height:100%; padding-top: 3%" alt="{{ $kamar->nama_kamar }}" />
    </div>
    <h1 class="text-center my-4">{{ $kamar->nama_kamar }}</h1>

    <div class="row">
        <div class="col-md-6">
            <h2>Informasi Kamar</h2>
            <p>Nama Kamar: {{ $kamar->nama_kamar }}</p>
            <p>Jumlah Kamar: {{ $kamar->jum_kamar }}</p>
            <p>Harga Kamar: Rp. {{ number_format($kamar->harga_kamar, 0, ',', '.') }}</p>
            <p>Deskripsi Kamar: {{ $kamar->deskripsi_kamar }}</p>
        </div>
        <div class="col-md-6">
            <h2>Checkout</h2>
            <form action="{{ route('kamar.checkout', $kamar->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama_pemesan">Nama Pemesan:</label>
                    <input type="text" name="nama_pemesan" class="form-control">
                </div>
                <div class="form-group">
                    <label for="check_in">Check-in:</label>
                    <input type="date" name="check_in" class="form-control">
                </div>
                <div class="form-group">
                    <label for="check_out">Check-out:</label>
                    <input type="date" name="check_out" class="form-control">
                </div>
                <div class="form-group">
                    <label for="jumlah_kamar">Jumlah Kamar:</label>
                    <input type="number" name="jumlah_kamar" class="form-control">
                </div>
                <div class="form-group" style="text-align: center;">
                    <button type="submit" class="btn btn-primary">Pesan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
