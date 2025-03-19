<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanans';

    protected $fillable = [
        'nama',
        'alamat',
        'no_telepon',
        'total_pembayaran',
        'metode_pembayaran',
        'layanan_dipesan',
        'waktu_pemesanan',
        'status',
        'bukti_transfer',
        'catatan'
    ];
}
