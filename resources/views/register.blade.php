@extends('layouts.kelompok3')

@section('ataskelompok3', 'Register')

@section('tengahkelompok3')

<div class="min-h-[100vh] flex items-center justify-center bg-gradient-to-tr from-gray-100 to-white px-4">
  <div class="w-full max-w-md bg-white shadow-xl border border-gray-300 rounded-2xl p-8 space-y-6 my-5" >
    
    <div class="text-center">
      <h2 class="mt-4 text-2xl font-semibold text-gray-800">Daftar Eventix</h2>
    </div>

    <!-- Success Alert -->
    @if ($success = Session::get('success'))
      <div class="bg-green-50 border border-green-200 rounded-xl p-4 mb-4" id="success-alert">
        <div class="flex items-center">
          <div class="flex-shrink-0">
            <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
          </div>
          <div class="ml-3">
            <p class="text-sm font-medium text-green-800">{{ $success }}</p>
          </div>
          
        </div>
      </div>
    @endif

    <!-- Error Alert -->
    @if ($errors->any())
      <div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-4" id="error-alert">
        <div class="flex">
          <div class="flex-shrink-0">
            <svg class="w-5 h-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
            </svg>
          </div>
          <div class="ml-3 flex-1">
            <h3 class="text-sm font-medium text-red-800 mb-1">Terjadi kesalahan:</h3>
            <ul class="text-sm text-red-700 space-y-1">
              @foreach ($errors->all() as $error)
                <li class="flex items-start">
                  <span class="inline-block w-1 h-1 bg-red-400 rounded-full mt-2 mr-2 flex-shrink-0"></span>
                  {{ $error }}
                </li>
              @endforeach
            </ul>
          </div>
          
        </div>
      </div>
    @endif

    <form method="POST" action="{{ url('/register') }}" class="space-y-4" enctype="multipart/form-data">
      @csrf
      <div>
        <label for="nama" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
        <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required
          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200">
      </div>

      <div>
        <label for="nim" class="block text-sm font-medium text-gray-700">NIM</label>
        <input type="number" id="nim" name="nim" value="{{ old('nim') }}" required
          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200">
      </div>

      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required
          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200">
      </div>

      <div>
        <label for="hak_akses" class="block text-sm font-medium text-gray-700">Hak Akses</label>
        <select id="hak_akses" name="hak_akses" required
          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200">
          <option value="admin">Admin</option>
          <option value="user">User</option>
        </select>
      </div>

      <div>
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" id="password" name="password" required
          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200">
      </div>

      <!-- Upload Foto -->
      <div>
        <label for="foto" class="block text-sm font-medium text-gray-700">Upload Foto</label>
        <div class="relative">
          <input type="file" name="foto" id="foto" class="hidden" accept="image/*" onchange="previewImage(event)">
          <button type="button" onclick="document.getElementById('foto').click()" 
                  class="w-full py-2.5 px-4 border-2 mt-2 border-dashed border-gray-600  text-gray-700 font-medium rounded-xl shadow-md">
            Pilih Foto
          </button>
          <div class="mt-2 text-center" id="preview-container">
            <img id="preview" src="#" alt="Foto Preview" class="hidden w-32 h-32 mx-auto rounded-full border border-gray-300">
          </div>
        </div>
      </div>

      <div>
        <button type="submit"
          class="w-full flex items-center justify-center gap-2 bg-blue-900 hover:bg-blue-950 text-white font-medium py-2.5 rounded-xl transition duration-300 shadow">
          <i class="fas fa-user-plus"></i> Daftar
        </button>
      </div>

      

    </form>

    <div class="text-center text-xs text-gray-400 pt-4 border-t border-gray-200">
      Eventix solusi pemesanan tiket online
    </div>

  </div>
</div>

  <script>
    // Preview image before upload
    function previewImage(event) {
      const file = event.target.files[0];
      const reader = new FileReader();
      const preview = document.getElementById('preview');
      const previewContainer = document.getElementById('preview-container');
      
      if (file) {
        reader.onload = function() {
          preview.src = reader.result;
          preview.classList.remove('hidden'); // Menampilkan gambar
        };
        reader.readAsDataURL(file);
        previewContainer.classList.remove('hidden');
      }
    }
  </script>

@endsection

@section('bawahkelompok3', 'Copyright 2025 Kelompok 3')
