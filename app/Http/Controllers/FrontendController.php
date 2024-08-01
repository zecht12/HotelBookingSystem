<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use App\Models\Kamar;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Invoice;
use Carbon\Carbon;

class FrontendController extends Controller
{
    public function index()
    {
        $kamars = Kamar::all();
        return view('welcome', compact('kamars'));
    }

    public function showKamar($id)
    {
        $kamar = Kamar::findOrFail($id);
        return view('kamar_detail', compact('kamar'));
    }

    public function checkout(Request $request, $id)
    {
        $namaPemesan = $request->input('nama_pemesan');
        $checkIn = $request->input('check_in');
        $checkOut = $request->input('check_out');
        $jumlahKamar = $request->input('jumlah_kamar');
        $kamar = Kamar::findOrFail($id);
        $hargaKamar = $kamar->harga_kamar;

        $checkInDate = Carbon::parse($checkIn);
        $checkOutDate = Carbon::parse($checkOut);
        $totalHari = $checkInDate->diffInDays($checkOutDate);
        $totalHarga = $hargaKamar * $jumlahKamar * $totalHari;
        $qrCode = QrCode::size(200)->generate('https://link.dana.id/qr/5p3r9dao');

        $invoice = new Invoice([
            'namaPemesan' => $namaPemesan,
            'checkIn' => $checkIn,
            'checkOut' => $checkOut,
            'nama_kamar' => $kamar->nama_kamar,
            'jumlahKamar' => $jumlahKamar,
            'hargaKamar' => $hargaKamar,
            'totalHarga' => $totalHarga,
        ]);

        $invoice->save();

        $checkInDate = Carbon::parse($checkIn);
        $now = Carbon::now();
        $daysDifference = $checkInDate->diffInDays($now);

        if ($daysDifference >= 1) {
            $invoice->status = "Berhasil Di checkout tapi belum di checkIn";
            $invoice->save();
        }
        else{
            $invoice->status = "Berhasil Di checkIn";
            $invoice->save();
        }

        $invoice->save();

        if ($invoice->status === "Berhasil Di checkout tapi belum di checkIn") {
            $kamar->jum_kamar -= $jumlahKamar * $totalHari;
            $kamar->save();
        }

        $data = [
            'namaPemesan' => $namaPemesan,
            'checkIn' => $checkIn,
            'checkOut' => $checkOut,
            'checkInDate' => $checkInDate,
            'checkOutDate' => $checkOutDate,
            'jumlahKamar' => $jumlahKamar,
            'totalHarga' => $totalHarga,
            'kamar' => $kamar,
            'qrCode' => $qrCode,
        ];
        $pdf = PDF::loadView('invoice', $data);
        return $pdf->download('invoice.pdf');
    }

}
