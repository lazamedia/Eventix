<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form592 extends Model
{
    protected $nama;
    protected $email;
    protected $telepon;
    protected $jenis_tiket;
    protected $jumlahTiket;
    protected $metodePembayaran;
    protected $data_592 = [];

    public function __construct($nama, $email, $telepon, $jenis_tiket, $jumlahTiket, $metodePembayaran)
    {
        $this->nama             = $nama;
        $this->email            = $email;
        $this->telepon          = $telepon;
        $this->jenis_tiket      = $jenis_tiket;
        $this->jumlahTiket      = $jumlahTiket;
        $this->metodePembayaran = $metodePembayaran;
    }

    public function protect_592()
    {
        array_push($this->data_592, [
            'nama'              => $this->nama,
            'email'             => $this->email,
            'telepon'           => $this->telepon,
            'jenis_tiket'       => $this->jenis_tiket,
            'jumlahTiket'       => $this->jumlahTiket,
            'metodePembayaran'  => $this->metodePembayaran,
        ]);
    }

    public function tampilkan_592()
    {
        $this->protect_592();
        return $this->data_592;
    }
    public function status_592()
    {
        return "Pesanan Atas Nama {$this->nama}, dengan tipe tiket {$this->jenis_tiket} berhasil dibuat!";
    }
}


// class Turunan592 extends Form592
// {
//     public function status_592()
//     {
//         return "Pesanan Atas Nama {$this->nama}, dengan tipe tiket {$this->jenis_tiket} berhasil dibuat!";
//     }
// }