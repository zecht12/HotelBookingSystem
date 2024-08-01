<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f5f5f5;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        .invoice-info {
            max-width: 600px;
            width: 100%;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: justify;
        }

        h2, h3 {
            text-align: center;
        }

        .img-fluid {
            max-width: 300px;
            height: auto;
            border-radius: 5px;
            margin-top: 10px;
        }

        p {
            margin-bottom: 10px;
        }

        .qr-code {
            text-align: center;
            margin-top: 20px;
        }
    </style>

</head>
<body>
    <h2>Invoice</h2>
    <div class="col-md-6 invoice-info">
        <h3>Checkout Information</h3>
        <p>Nama Pemesan: {{ $namaPemesan }}</p>
        <p>Tanggal Check-in: {{ $checkIn }}</p>
        <p>Tanggal Check-out: {{ $checkOut }}</p>
        <p>Jumlah Hari Menginap: {{ $checkInDate->diffInDays($checkOutDate) }}</p>
        <p>Jumlah Kamar: {{ $jumlahKamar }}</p>
        <p>Total Harga: Rp. {{ number_format($totalHarga, 0, ',', '.') }}</p>
        <h3>Kamar Information</h3>
        <p>Nama Kamar: {{ $kamar->nama_kamar }}</p>
        <p>Jumlah Kamar yang tersedia: {{ $kamar->jum_kamar }}</p>
        <p>Harga Kamar: Rp. {{ number_format($kamar->harga_kamar, 0, ',', '.') }}</p>
        <p>Deskripsi Kamar: {{ $kamar->deskripsi_kamar }}</p>
        <div class="qr-code">
            <h3>QR Code Pembayaran</h3>
            <img src="data:image/png;base64, {!! base64_encode($qrCode) !!}" alt="QR Code" class="img-fluid" />
        </div>
    </div>
</body>
</html>
