<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Form588Controller;
use App\Http\Controllers\Form592Controller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserViewController;

Route::get('/', function () {
    return view('home');
});

Route::get('/register', [ProfileController::class, 'index'])->middleware('guest');
Route::post('/register', [ProfileController::class, 'store']);

Route::get('/tiket_588', [Form588Controller::class, 'form']);
Route::post('/tiket_588', [Form588Controller::class, 'store']);
Route::delete('/tiket_588/{id}', [Form588Controller::class, 'destroy'])->name('tiket_588.destroy');

Route::get('/buytiket_592', [Form592Controller::class, 'form']);
Route::post('/buytiket_592', [Form592Controller::class, 'store']);    
Route::delete('/buytiket_592/{id}', [Form592Controller::class, 'destroy'])->name('item592.delete');    


Route::get('/login', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);



Route::get('/user', [UserViewController::class, 'index'])->name('user.index');
Route::delete('/user/{id}', [UserViewController::class, 'destroy'])->name('user.delete');







Route::get('/session', function () {
    return view('session');
})->name('session');

Route::post('/session/clear', function () {
    Session::flush();
    return redirect()->route('session')->with('message', 'Session berhasil dibersihkan!');
})->name('session.clear');