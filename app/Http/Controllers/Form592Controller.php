<?php

namespace App\Http\Controllers;

use App\Models\Form592;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class Form592Controller extends Controller
{
    public function form()
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        $userNim = Auth::user()->nim;
        if ($userNim != '2313010592') {
            return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }

        $pesanan = Form592::orderBy('created_at', 'desc')->get();
        return view('form.form_592', compact('pesanan'));
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nama_592'        => 'required|string|max:255',
            'email_592'       => 'required|email|max:255',
            'telepon_592'     => 'required|string|max:20',
            'foto_592'        => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'jenis_tiket_592' => 'required|in:regular,vip,platinum',
            'jumlah_592'      => 'required|integer|min:1|max:10',
            'metode_592'      => 'required|in:transfer,ewallet,credit',
        ], [
            'nama_592.required'        => 'Nama harus diisi.',
            'email_592.required'       => 'Email harus diisi.',
            'email_592.email'          => 'Format email tidak valid.',
            'telepon_592.required'     => 'Telepon harus diisi.',
            'foto_592.image'           => 'File harus berupa gambar atau PDF.',
            'foto_592.mimes'           => 'Format foto harus jpg, jpeg, png, atau pdf.',
            'foto_592.max'             => 'Ukuran foto maksimal 2 MB.',
            'jenis_tiket_592.required' => 'Jenis tiket harus dipilih.',
            'jumlah_592.required'      => 'Jumlah tiket harus diisi.',
            'jumlah_592.integer'       => 'Jumlah tiket harus berupa angka.',
            'jumlah_592.min'           => 'Jumlah tiket minimal 1.',
            'jumlah_592.max'           => 'Jumlah tiket maksimal 10.',
            'metode_592.required'      => 'Metode pembayaran harus dipilih.',
        ]);

        if ($validator->fails()) {
            return redirect('/buytiket_592')
                        ->withErrors($validator)
                        ->withInput();
        } else {

            $nama_592           = $request->nama_592;
            $email_592          = $request->email_592;
            $telepon_592        = $request->telepon_592;
            $jenis_tiket_592    = $request->jenis_tiket_592;
            $jumlah_592         = $request->jumlah_592;
            $metode_592         = $request->metode_592;

            $nim = Auth::user()->nim;
            $directory = ($nim % 2 == 0) ? 'genap' : 'ganjil';

            $fotoPath = null;

            if ($request->hasFile('foto_592')) {

                $foto       = $request->file('foto_592');

                $fileName   = time() . '.' . $foto->getClientOriginalExtension();

                $path       = $foto->storeAs($directory, $fileName); 

                $fotoPath   = Storage::url($path); 
            }

            $hargaTiket = 0;

            if ($jenis_tiket_592 === 'regular') {

                $hargaTiket = 350000;

            } elseif ($jenis_tiket_592 === 'vip') {

                $hargaTiket = 750000;

            } elseif ($jenis_tiket_592 === 'platinum') {

                $hargaTiket = 1500000;

            }

            $totalHarga = $hargaTiket * $jumlah_592;

            $form = new Form592;

            $form->nama_592        = $nama_592;
            $form->email_592       = $email_592;
            $form->telepon_592     = $telepon_592;
            $form->foto_592        = $fotoPath;
            $form->jenis_tiket_592 = $jenis_tiket_592;
            $form->jumlah_592      = $jumlah_592;
            $form->metode_592      = $metode_592;
            $form->total_harga     = $totalHarga;

            $form->save();

            return redirect('/buytiket_592')
                   ->with('success', 'Data berhasil disimpan');
        }
    }

    public function destroy($id)
    {
        $form = Form592::findOrFail($id);

        if ($form->foto_592 && Storage::disk('public')->exists(str_replace('/storage/', '', $form->foto_592))) {

            Storage::disk('public')
                ->delete(str_replace('/storage/', '', $form->foto_592));

        }

        $form->delete();

        return redirect('/buytiket_592')
               ->with('success', 'Data dan foto berhasil dihapus');
    }
}
