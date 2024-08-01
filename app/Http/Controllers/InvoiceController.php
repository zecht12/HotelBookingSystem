<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Invoice;
use App\Models\Admin;
use Illuminate\Http\Request;
use Carbon\Carbon;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::all();
        $kamars = Kamar::all();
        $namaKamars = $kamars->pluck('nama_kamar')->toArray();
        $jumlahKamars = [];
        $jumlahKamarsDibatalkan = [];

        foreach ($namaKamars as $namaKamar) {
            $jumlahKamars[] = Invoice::where('nama_kamar', $namaKamar)->where('status', '!=', 'Dibatalkan')->sum('jumlahKamar');
            $jumlahKamarsDibatalkan[] = Invoice::where('nama_kamar', $namaKamar)->where('status', 'Dibatalkan')->sum('jumlahKamar');
        }

        foreach ($invoices as $invoice) {
            if ($invoice->status === 'Berhasil Di checkout tapi belum di checkIn') {
                $checkInDate = Carbon::parse($invoice->checkIn);
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
            }
        }

        return view('invoice.index', compact('invoices', 'namaKamars', 'jumlahKamars', 'jumlahKamarsDibatalkan'));
    }

    public function cancelOrder($id)
    {
        $invoice = Invoice::findOrFail($id);

        if ($invoice->status === 'Berhasil Di checkout tapi belum di checkIn') {
            $kamar = Kamar::where('nama_kamar', $invoice->nama_kamar)->first();
            $durasiInap = Carbon::parse($invoice->checkIn)->diffInDays(Carbon::parse($invoice->checkOut));
            $kamar->jum_kamar += $invoice->jumlahKamar * $durasiInap;
            $kamar->save();
        }

        $invoice->status = 'Dibatalkan';
        $invoice->save();

        return redirect()->route('invoices.index')->with('success', 'Status pesanan berhasil diubah menjadi Dibatalkan');
    }
}
