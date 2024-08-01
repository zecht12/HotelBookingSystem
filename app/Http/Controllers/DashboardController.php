<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;
use App\Models\Invoice;
use App\Models\Admin;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $kamars = Kamar::all();
        $namaKamars = $kamars->pluck('nama_kamar')->toArray();

        $jumlahKamars = [];
        $jumlahKamarsDibatalkan = [];

        foreach ($namaKamars as $namaKamar) {
            $jumlahKamars[] = Invoice::where('nama_kamar', $namaKamar)->where('status', '!=', 'Dibatalkan')->sum('jumlahKamar');
            $jumlahKamarsDibatalkan[] = Invoice::where('nama_kamar', $namaKamar)->where('status', 'Dibatalkan')->sum('jumlahKamar');
        }

        $admins = Admin::all()->groupBy('role')->map->count();

        return view('dashboard', compact('namaKamars', 'jumlahKamars', 'jumlahKamarsDibatalkan','admins'));
    }
}
