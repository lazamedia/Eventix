<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        $nim = session('nim');

        if ($nim === '2313010592') {
            return redirect('/buytiket_592'); 
        }

        if ($nim === '2313010588') {
            return redirect('/tiket_588'); 
        }

        return view('login');
    }


    public function login(Request $request)
    {
        $credentials = [
            "2313010592"    => [
                "nim"       => "2313010592",
                "password"  => "2313010592",
                "nama"      => "Lazuardi Mandegar",
                "foto"      => "assets/img/592.jpg",
                "redirect"  => "/buytiket_592"
            ],
            "2313010588"    => [
                "nim"       => "2313010588",
                "password"  => "2313010588",
                "nama"      => "Ardi Mulyana",
                "foto"      => "assets/img/588.jpg",
                "redirect"  => "/tiket_588"
            ],
        ];

        $nim        = $request->input('nim');
        $password   = $request->input('password');

        if (isset($credentials[$nim]) && $credentials[$nim]['password'] === $password) {
            
            // Simpan data ke session
            Session::put('nama' , $credentials[$nim]['nama']);
            Session::put('nim'  , $nim);
            Session::put('foto' , $credentials[$nim]['foto']);

            return redirect($credentials[$nim]['redirect']);
        }

        return back()->with(['error' => 'NIM atau Password salah.'])->withInput();
    }

    public function logout()
    {
        Session::flush();
        return redirect('/login');
    }
}
