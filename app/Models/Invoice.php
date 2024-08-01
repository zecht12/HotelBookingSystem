<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'namaPemesan',
        'checkIn',
        'checkOut',
        'nama_kamar',
        'jumlahKamar',
        'hargaKamar',
        'status',
        'totalHarga'
    ];
}
