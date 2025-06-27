<?php

namespace App\Http\Controllers;

use App\Models\Form592;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class Form592Controller extends Controller
{
    public function form()
    {
        $nim = session('nim');

        if (!$nim || $nim !== '2313010592') {
            return redirect('/')->with('error', 'Akses tidak diizinkan. Nim kamu tidak sesuai.');
        }
        
        return view('form.form_592', [
            'nama'  => Session::get('nama'),
            'nim'   => Session::get('nim'),
            'foto'  => Session::get('foto'),
        ]);
        
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_592'          => 'required',
            'email_592'         => 'required|email',
            'telepon_592'       => 'required',
            'jenis_tiket_592'   => 'required',
            'jumlah_592'        => 'required|numeric',
            'metode_592'        => 'required',
        ]);

        $cetak = new Form592(
            $validated['nama_592'],
            $validated['email_592'],
            $validated['telepon_592'],
            $validated['jenis_tiket_592'],
            $validated['jumlah_592'],
            $validated['metode_592']
        );

        $tampilkan  = $cetak->tampilkan_592();
        // $status     = $cetak->status_592();

        return view('form.form_592', compact('tampilkan'));
    }
}

