<?php

namespace App\Http\Controllers;

use App\Models\Form588;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class Form588Controller extends Controller
{
    public function form()
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        $userNim = Auth::user()->nim;

        if ($userNim != '2313010588') {
            return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }

        $tickets = Form588::orderBy('created_at', 'desc')->get();

        return view('form.form_588', compact('tickets'));
    }

       public function store(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'namaEvent' => 'required|string|max:255',
                'kategori'  => 'required|string|max:50',
                'tanggal'   => 'required|date',
                'lokasi'    => 'required|string|max:255',
                'harga'     => 'required|integer',
                'stok'      => 'required|integer',
                'status'    => 'required|string|max:50',
                'foto_588'  => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            ], [
                'namaEvent.required' => 'Nama Event harus diisi.',
                'kategori.required'  => 'Kategori Event harus dipilih.',
                'tanggal.required'   => 'Tanggal Event harus diisi.',
                'tanggal.date'       => 'Format tanggal tidak valid.',
                'lokasi.required'    => 'Lokasi harus diisi.',
                'harga.required'     => 'Harga Tiket harus diisi.',
                'harga.integer'      => 'Harga Tiket harus berupa angka.',
                'stok.required'      => 'Jumlah Stok harus diisi.',
                'stok.integer'       => 'Jumlah Stok harus berupa angka.',
                'status.required'    => 'Status Tiket harus dipilih.',
                'foto_588.image'     => 'Upload harus berupa gambar.',
                'foto_588.mimes'     => 'Format file tidak valid (jpg,jpeg,png,gif,svg).',
                'foto_588.max'       => 'Ukuran file maksimal 2MB.',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                                ->withErrors($validator)
                                ->withInput();
            }

            $data = $validator->validated();

            $nim = Auth::user()->nim;
            $directory = ($nim % 2 == 0) ? 'genap' : 'ganjil';

            $fotoPath = null;

            if ($request->hasFile('foto_588')) {

                $foto       = $request->file('foto_588');

                $fileName   = time() . '.' . $foto->getClientOriginalExtension();

                $path       = $foto->storeAs($directory, $fileName); 

                $fotoPath   = Storage::url( $path); 
            }

            Form588::create([
                'namaEvent' => $data['namaEvent'],
                'kategori'  => $data['kategori'],
                'tanggal'   => $data['tanggal'],
                'lokasi'    => $data['lokasi'],
                'harga'     => $data['harga'],
                'stok'      => $data['stok'],
                'status'    => $data['status'],
                'foto'      => $fotoPath,
            ]);

            return redirect()->back()
                            ->with('success', 'Tiket berhasil dibuat.');
        }

        public function destroy($id)
        {
            $ticket = Form588::findOrFail($id);

            if ($ticket->foto && Storage::disk('public')->exists(str_replace('/storage/', '', $ticket->foto))) {

                Storage::disk('public')
                    ->delete(str_replace('/storage/', '', $ticket->foto));

            }

            $ticket->delete();

            return redirect('/tiket_588')
                   ->with('success', 'Data dan foto berhasil dihapus');
        }

}
