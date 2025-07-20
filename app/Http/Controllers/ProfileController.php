<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        return view('register');
    }

   public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nama'      => 'required',
            'email'     => 'required|email|unique:user,email',
            'hak_akses' => 'required',
            'password'  => 'required',
            'foto'      => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
            'nim'       => 'required|numeric', 
        ], [
            'nim.required'          => 'NIM harus diisi.',
            'nim.numeric'           => 'NIM harus berupa angka.',
            'nama.required'         => 'Nama harus diisi.',
            'email.required'        => 'Email harus diisi.',
            'email.email'           => 'Format email tidak valid.',
            'email.unique'          => 'Email sudah terdaftar.',
            'hak_akses.required'    => 'Hak akses harus diisi.',
            'password.required'     => 'Password harus diisi.',
        ]);

        if ($validator->fails()) {
            return redirect('/register')
                    ->withErrors($validator)
                    ->withInput();
        } else {
            
            $nama       = $request->nama;
            $email      = $request->email;
            $hak_akses  = $request->hak_akses;
            $password   = $request->password;
            $nim        = $request->nim; 

            $directory = ($nim % 2 == 0) ? 'genap' : 'ganjil';

            $fotoPath = null;

            if ($request->hasFile('foto')) {

                $foto       = $request->file('foto');

                $fileName   = time() . '.' . $foto->getClientOriginalExtension();

                $path       = $foto->storeAs($directory, $fileName); 

                $fotoPath   = Storage::url($path); 
            }

            $user = new UserModel; 
            
            $user->nim          = $nim; 
            $user->nama         = $nama;
            $user->email        = $email;
            $user->hak_akses    = $hak_akses;
            $user->password     = Hash::make($password); 
            $user->foto         = $fotoPath; 

            $user->save(); 

            return redirect('/register')->with('success', 'Data berhasil disimpan');
        }
    }


}
