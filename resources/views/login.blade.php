@extends('layouts.kelompok3')

@section('ataskelompok3', 'Login')

@section('tengahkelompok3')

<div class="min-h-[80vh] flex items-center justify-center bg-gradient-to-tr from-gray-100 to-white px-4">
  <div class="w-full max-w-md bg-white shadow-xl border border-gray-300 rounded-2xl p-8 space-y-6">
    
    <div class="text-center">
      <h2 class="mt-4 text-2xl font-semibold text-gray-800">Login EVENTIX</h2>
      {{-- <p class="text-sm text-gray-500">Silakan masuk untuk melanjutkan</p> --}}
    </div>

    <form method="POST" action="{{ url('/login') }}" class="space-y-4">
      @csrf
      <div>
        <label for="nim" class="block text-sm font-medium text-gray-700">NIM</label>
        <input type="text" id="nim" name="nim" value="{{ old('nim') }}" required
          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200">
      </div>

      <div>
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" id="password" name="password" required
          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200">
      </div>

      <div>
        <button type="submit"
          class="w-full flex items-center justify-center gap-2 bg-blue-900 hover:bg-blue-950 text-white font-medium py-2.5 rounded-xl transition duration-300 shadow">
          <i class="fas fa-sign-in-alt"></i> Masuk
        </button>
      </div>

      @if (session('error'))
        <div class="mt-3 text-sm text-red-600 text-center bg-red-100 py-2 px-3 rounded-lg shadow-sm">
          {{ session('error') }}
        </div>
      @endif
    </form>

    <div class="text-center text-xs text-gray-400 pt-4 border-t border-gray-200">
      Eventix solusi pemesanan tiket online
    </div>

  </div>
  
</div>

@endsection


@section('bawahkelompok3', 'Copyright 2025 Kelompok 3')
