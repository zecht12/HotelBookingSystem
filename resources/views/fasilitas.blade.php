@extends('layouts.layoutfasilitas')
@section('content')
    <style>
        .containers {
            padding: 20px;
            max-width: 800px;
            margin: auto;
        }

        .advantages-section h2 {
            font-size: 24px;
            margin-bottom: 10px;
            text-align: center;
        }

        .advantages-section p {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 20px;
            text-align: justify;
        }

        .advantages-section h3 {
            margin-top: 20px;
            margin-bottom: 10px;
        }
    </style>
    <div class="containers">
        <div class="advantages-section">
            <h2>Kelebihan Hotel</h2>
            <div class="row kamar">
                <div class="col-md-4">
                    <div class="card card-light">
                        <div class="card-header">
                            Sarapan
                        </div>
                        <div class="card-body p-0">
                            <img src="images/sarapan.jpg" class="img-fluid rounded kamar-image" style="width: 450px; height:250px;" alt="" />
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-light">
                        <div class="card-header">
                            Kolam renang
                        </div>
                        <div class="card-body p-0">
                            <img src="images/kolam_renang.jpg" class="img-fluid rounded kamar-image" style="width: 450px; height:250px;" alt="" />
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-light">
                        <div class="card-header">
                            Restaurant
                        </div>
                        <div class="card-body p-0">
                            <img src="images/restoran.jpg" class="img-fluid rounded kamar-image" style="width: 450px; height:250px;" alt="" />
                        </div>
                    </div>
                </div>
            </div>
            <h3>Transportation</h3>
            <p>
                Hotel ini hanya berjarak 6 menit dari Bandara Internasional. Tersedia transfer bandara dan stasiun kereta api gratis. Layanan bus antar-jemput gratis beroperasi dari hotel ke kota. Dalam kota, bus tingkat dan bus kota menawarkan perjalanan ekonomis di jalan-jalan utama, sementara bus mini kota tersedia untuk seluruh wilayah Solo.
            </p>
            <h3>Accommodation</h3>
            <p>
                100 kamar ditata luar biasa menawarkan pemandangan taman atau laguna eksklusif dengan akses taman yang terdiri dari 100 kamar standard, Deluxe & Superior, dan kolam renang atau spa pribadi. Resor bisnis bintang lima kami siap membantu Anda. Kamar bebas rokok dan kamar untuk penyandang cacat juga tersedia.
            </p>
            <h3>Room Facilities</h3>
            <p>
                Semua kamar dilengkapi dengan: saluran TV satelit global, saluran film dalam kamar, telepon ISD/STD sambungan langsung, mini bar, kulkas, AC yang dapat dikontrol sendiri, fasilitas membuat teh dan kopi, jubah mandi dan sandal, berbagai perlengkapan kamar mandi, dan pengering rambut bawaan.
            </p>
        </div>
    </div>
@endsection
