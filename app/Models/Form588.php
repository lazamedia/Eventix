<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form588 extends Model {
    protected $namaEvent;
    protected $kategori;
    protected $tanggal;
    protected $lokasi;
    protected $harga;
    protected $stok;
    protected $status;
    protected $data_588 = [];

    public function __construct($namaEvent, $kategori, $tanggal, $lokasi, $harga, $stok, $status) {
        $this->namaEvent  = $namaEvent;
        $this->kategori   = $kategori;
        $this->tanggal    = $tanggal;
        $this->lokasi     = $lokasi;
        $this->harga      = $harga;
        $this->stok       = $stok;
        $this->status     = $status;
    }

    public function protect_588() {
        array_push($this->data_588, [
            'namaEvent'   => $this->namaEvent,
            'kategori'    => $this->kategori,
            'tanggal'     => $this->tanggal,
            'lokasi'      => $this->lokasi,
            'harga'       => $this->harga,
            'stok'        => $this->stok,
            'status'      => $this->status,
        ]);
    }

    public function tampilkan_588() {
        $this->protect_588();
        return $this->data_588;
    }

}
