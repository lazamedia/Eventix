<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Form588Controller;
use App\Http\Controllers\Form592Controller;

Route::get('/', function () {
    return view('home');
});


Route::middleware(['CheckNim'])->group(function () {

    Route::get('/tiket_588', [Form588Controller::class, 'form']);
    Route::post('/tiket_588', [Form588Controller::class, 'store']);

    Route::get('/buytiket_592', [Form592Controller::class, 'form']);
    Route::post('/buytiket_592', [Form592Controller::class, 'store']);    

}); 

Route::get('/login', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);











Route::get('/session', function () {
    return view('session');
})->name('session');

Route::post('/session/clear', function () {
    Session::flush();
    return redirect()->route('session')->with('message', 'Session berhasil dibersihkan!');
})->name('session.clear');