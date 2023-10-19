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
  
}
