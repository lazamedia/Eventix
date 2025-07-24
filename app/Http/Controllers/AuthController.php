<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {

    if (Auth::check()) {

        // Mengambil NIM pengguna yang sedang login
        $userNim = Auth::user()->nim;

        // Mengarahkan pengguna berdasarkan NIM
        if ($userNim == '2313010592') {

            return redirect('/buytiket_592')->with('success', 'Anda sudah login, mengarahkan ke form beli.');

        } elseif ($userNim == '2313010588') {

            return redirect('/tiket_588')->with('success', 'Anda sudah login, mengarahkan ke form create.');
            
        }

        // Jika NIM tidak sesuai , arahkan ke halaman utama
        return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }

        return view('login');

    }


    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nim' => 'required',
            'password' => 'required',
        ],[
            'nim.required' => 'NIM harus diisi',
            'password.required' => 'Password harus diisi',
        ]);
       
        if ($validator->fails()) {
            return redirect('/login')
                    ->withErrors($validator)
                    ->withInput();
        }

        if (Auth::attempt(['nim' => $request->nim, 'password' => $request->password])) {
            
                $request->session()->regenerate();
                
                // Mengambil NIM pengguna yang login
                $nim_user = Auth::user()->nim;

                // Mengarahkan berdasarkan NIM
                if ($nim_user == '2313010592') {

                    return redirect('/buytiket_592')->with('success', 'Login berhasil dengan nim '.$request->nim);

                } elseif ($nim_user == '2313010588') {

                    return redirect('/tiket_588')->with('success', 'Login berhasil dengan nim '.$request->nim);

                }

                // Jika NIM tidak cocok dengan keduanya, arahkan ke halaman utama
                return redirect('/')->with('success', 'Login berhasil dengan nim '.$request->nim);

            }

       return redirect('/login')->with('error', 'NIM atau password salah');

    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/')->with('success', 'Logout berhasil');
    }
}
