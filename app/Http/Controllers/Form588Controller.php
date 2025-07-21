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
            // validasi input user melalui validator
            $validator = Validator::make($request->all(), [
                'namaEvent_588' => 'required|string|max:255',
                'kategori_588'  => 'required|string|max:50',
                'tanggal_588'   => 'required|date',
                'lokasi_588'    => 'required|string|max:255',
                'harga_588'     => 'required|integer',
                'stok_588'      => 'required|integer',
                'status_588'    => 'required|string|max:50',
                'foto_588'      => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            ], [
                'namaEvent_588.required' => 'Nama Event harus diisi.',
                'kategori_588.required'  => 'Kategori Event harus dipilih.',
                'tanggal_588.required'   => 'Tanggal Event harus diisi.',
                'tanggal_588.date'       => 'Format tanggal tidak valid.',
                'lokasi_588.required'    => 'Lokasi harus diisi.',
                'harga_588.required'     => 'Harga Tiket harus diisi.',
                'harga_588.integer'      => 'Harga Tiket harus berupa angka.',
                'stok_588.required'      => 'Jumlah Stok harus diisi.',
                'stok_588.integer'       => 'Jumlah Stok harus berupa angka.',
                'status_588.required'    => 'Status Tiket harus dipilih.',
                'foto_588.image'         => 'Upload harus berupa gambar.',
                'foto_588.mimes'         => 'Format file tidak valid (jpg,jpeg,png,gif,svg).',
                'foto_588.max'           => 'Ukuran file maksimal 2MB.',
            ]);

            // jika terjadi kesalahan maka kembali ke halaman tadi 
            // dengan menampilkan kesalahan sesuai validator
            if ($validator->fails()) {
                return redirect()->back()
                                ->withErrors($validator)
                                ->withInput();
            }
            // jika tidak ada kesalahan maka jalankan proses penyimpanan 
            else {
                $namaEvent = $request->namaEvent_588;
                $kategori  = $request->kategori_588;
                $tanggal   = $request->tanggal_588;
                $lokasi    = $request->lokasi_588;
                $harga     = $request->harga_588;
                $stok      = $request->stok_588;
                $status    = $request->status_588;

                // ambil nim pengguna untuk menentukan direktori penyimpanan
                $nim = Auth::user()->nim;
                
                // misal nim genap maka simpan di direktori genap
                $directory = ($nim % 2 == 0) ? 'genap' : 'ganjil';

                // variable untuk menyimpan path gambar
                $fotoPath = null;

                // cek apakah ada file gambar yang diupload
                // kalo ada maka simpan ke direktori
                if ($request->hasFile('foto_588')) {

                    $foto       = $request->file('foto_588');

                    $fileName   = time() . '.' . $foto->getClientOriginalExtension();

                    $path       = $foto->storeAs($directory, $fileName); 

                    $fotoPath   = Storage::url( $path); 
                }

                $form = new Form588;

                $form->namaEvent = $namaEvent;
                $form->kategori  = $kategori;
                $form->tanggal   = $tanggal;
                $form->lokasi    = $lokasi;
                $form->harga     = $harga;
                $form->stok      = $stok;
                $form->status    = $status;
                $form->foto      = $fotoPath;

                $form->save();

                return redirect('/tiket_588')->with('success', 'Data berhasil disimpan.');
            }

            
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
