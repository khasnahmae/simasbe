<?php
// app\Models\SuratKeluar.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;
    protected $table = 'suratkeluar';
    protected $guarded = [];
    protected $fillable = [
        'nomor_surat',
        'tanggal_keluar',
        'penerima',
        'perihal',
        // tambahkan field lain sesuai kebutuhan
    ];
}
