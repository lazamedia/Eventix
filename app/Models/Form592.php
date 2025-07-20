<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form592 extends Model
{
    protected $table = 'form592';

    protected $fillable = [
        'nama_592',
        'email_592',
        'telepon_592',
        'foto_592',
        'jenis_tiket_592',
        'jumlah_592',
        'metode_592',
        'total_harga',
    ];


}


