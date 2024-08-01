@extends('layouts.tamu')
@section('content')

    <h1 class="mt-4 mb-2"><i class="fas fa-hotel" style="font-size: 30px"></i> Kamar Hotel</h1>
    <p style="margin-bottom: 1%">Nikmati pengalaman menginap nyaman di bawah Rp 500K di hotel-hotel di Bali, Bandung, Makassar, dan masih banyak lagi!</p>
    <div class="row kamar">
        @foreach($kamars as $kamar)
            <div class="col-md-4">
                <a class="card card-light" href="{{ route('kamar.detail', ['id' => $kamar->id]) }}">
                    <div class="card-header">
                        {{ $kamar->nama_kamar }}
                    </div>
                    <div class="card-body p-0">
                        <img src="{{ asset('/images/kamar/' . $kamar->foto_kamar) }}" class="img-fluid rounded kamar-image" style="width: 450px; height:250px;" alt="{{ $kamar->nama_kamar }}" />
                    </div>
                    <div class="card-footer">
                        Rp. {{ $kamar->harga_kamar }}
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection