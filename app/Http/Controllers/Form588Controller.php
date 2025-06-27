<?php

namespace App\Http\Controllers;

use App\Models\Form588;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Form588Controller extends Controller
{
    public function form()
    {
        $nim = session('nim');

        if ($nim === '2313010592') {
            return redirect('/')->with('error', 'Akses tidak diizinkan. Nim kamu tidak sesuai.');
        }

        return view('form.form_588', [
            'nama'  => Session::get('nama'),
            'nim'   => Session::get('nim'),
            'foto'  => Session::get('foto'),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'namaEvent' => 'required',
            'kategori'  => 'required',
            'tanggal'   => 'required',
            'lokasi'    => 'required',
            'harga'     => 'required',
            'stok'      => 'required',
            'status'    => 'required',
        ]);

        $cetak = new Form588(
            $request->input('namaEvent'),
            $request->input('kategori'),
            $request->input('tanggal'),
            $request->input('lokasi'),
            $request->input('harga'),
            $request->input('stok'),
            $request->input('status'),
        );

        $tampilkan_588  = $cetak->tampilkan_588();

        return view('form.form_588', compact('tampilkan_588'));
    }

}
