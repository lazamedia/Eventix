<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form588 extends Model {
   
    protected $table = 'form588';

    protected $fillable = [
        'namaEvent',
        'kategori',
        'tanggal',
        'lokasi',
        'harga',
        'stok',
        'status',
        'foto',
    ];

}
