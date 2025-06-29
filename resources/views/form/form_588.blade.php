
@extends('layouts.kelompok3')

@section('ataskelompok3', 'Form 588')

@section('tengahkelompok3')

{{-- @php

    if (!session()->has('nim')) {
        header('Location: ' . url('/login'));
        exit;               
    }

    if (session('nim') !== '2313010588') {
        session()->flash('error', 'Akses ditolak, NIM kamu tidak sesuai.');
        session()->save();
        header('Location: ' . url('/home') );
        exit;
    }

@endphp --}}


<!-- Menampilkan data session -->
<div class="bg-gray-50 border border-x-4 rounded-md border-gray-400 border-x-cyan-700 shadow p-5 flex justify-center gap-20 max-w-screen-lg mx-auto my-5">
    <img src="{{ session('foto') }}" class="rounded-full w-[100px] h-[100px] border border-cyan-500 shadow-md object-cover shadow-cyan-500" alt="Foto Profil">
    <div>
      <h1 class="text-2xl mb-2 text-gray-950 font-light">Form Pembuatan Tiket</h1>
      <p class="text-lg font-bold text-gray-700">Nama : {{ session('nama') }}</p>
      <p class="text-gray-600">NIM : {{ session('nim') }}</p>
    </div>
</div>
<!-- -- -->

<div class="bg-gray-200 w-full p-5">
  <div class="max-w-screen-lg bg-white mx-auto shadow rounded-lg border border-gray-300 mt-5">

    <div class="w-full bg-blue-950 justify-center items-center rounded-t-lg py-3">
      <h1 class="text-md font-semibold text-white text-center">Pembuatan Tiket Event</h1>
    </div>

    <div class="gap-3 grid grid-cols-1 md:grid-cols-2 p-6">

      <!-- Form untuk pembuatan tiket -->
      <form method="POST" action="{{ url('/tiket_588') }}" class="">

        @csrf

        <div class="space-y-4">
          <div>
            <label for="namaEvent" class="block text-gray-700 font-semibold mb-1">Nama Event</label>
            <input type="text" id="namaEvent" name="namaEvent" required
              class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
          </div>

          <div>
            <label for="kategori" class="block text-gray-700 font-semibold mb-1">Kategori Event</label>
            <select id="kategori" name="kategori" required
              class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
              <option value="">Pilih Kategori</option>
              <option value="konser">Konser Musik</option>
              <option value="festival">Festival</option>
              <option value="seminar">Seminar</option>
              <option value="workshop">Workshop</option>
              <option value="pameran">Pameran</option>
            </select>
          </div>

          <div>
            <label for="tanggal" class="block text-gray-700 font-semibold mb-1">Tanggal Event</label>
            <input type="date" id="tanggal" name="tanggal" required
              class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
          </div>

          <div>
            <label for="lokasi" class="block text-gray-700 font-semibold mb-1">Lokasi</label>
            <input type="text" id="lokasi" name="lokasi" required
              class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
          </div>

          <div>
            <label for="harga" class="block text-gray-700 font-semibold mb-1">Harga Tiket (Rp)</label>
            <input type="text" id="harga" name="harga" required
              class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
          </div>

          <div>
            <label for="stok" class="block text-gray-700 font-semibold mb-1">Jumlah Stok</label>
            <input type="text" id="stok" name="stok" required
              class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
          </div>

          <div>
            <label for="status" class="block text-gray-700 font-semibold mb-1">Status Tiket</label>
            <select id="status" name="status" required
              class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
              <option value="">Pilih Status</option>
              <option value="tersedia">Tersedia</option>
              <option value="segera">Segera Hadir</option>
              <option value="terbatas">Stok Terbatas</option>
              <option value="habis">Habis</option>
            </select>
          </div>

          <button type="submit"
            class="w-full bg-cyan-600 hover:bg-cyan-700 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            Buat Tiket
          </button>
        </div>
      </form>

      <!-- Hasil Output dari Object !empty($tampilkan) && count($tampilkan) > 0 -->
      @if (!empty($tampilkan_588) )

        <div class="w-full">
          <!-- Menampilkan Output -->
          
            @foreach ($tampilkan_588 as $data)
            <div class="w-full">
                
                <div class="relative mx-auto max-w-md transform transition-transform duration-300 overflow-hidden">
                
                <div class="rounded-lg overflow-hidden shadow-xl border-2 border-gray-400">
                    
                    <div class="bg-cyan-600 p-4 text-left">
                    <h2 class="text-white text-xl font-bold tracking-wider">{{ $data['namaEvent'] }}</h2>
                    <p class="text-gray-200 text-sm">{{ $data['tanggal'] }}</p>
                    </div>

                
                    <div class="p-5 bg-white bg-opacity-10 backdrop-blur-sm">
                    <div class="flex justify-between items-center mb-4">
                        <div>
                        <p class="text-blue-950 text-xs uppercase">Kategori</p>
                        <p class="text-blue-950 font-bold">{{ $data['kategori'] }}</p>
                        </div>
                        <div class="bg-yellow-300 text-black font-bold py-1 px-3 rounded-full text-xs uppercase">{{ $data['status'] }}</div>
                    </div>

                    <div class="flex justify-between mb-4">
                        <div>
                        <p class="text-blue-950 text-xs uppercase">Lokasi</p>
                        <p class="text-blue-950 font-bold">{{ $data['lokasi'] }}</p>
                        </div>
                        <div>
                        <p class="text-blue-950 text-xs uppercase">Harga</p>
                        <p class="text-blue-950 font-bold">Rp {{ $data['harga'] }}</p>
                        </div>
                    </div>

                    <div class="mb-4">
                        <p class="text-blue-950 text-xs uppercase">Stok Tersedia</p>
                        <p class="text-blue-950 font-bold">{{ $data['stok'] }} tiket</p>
                    </div>

                    </div>

                    
                    <div class="border-t border-dashed border-gray-300 p-4 flex justify-between items-center bg-gray-200">
                    <div>
                        <p class="text-gray-700 text-xs">Powered by</p>
                        <p class="text-gray-700 font-bold text-sm">EVENTIX</p>
                    </div>
                    <div class="text-blue-950 text-xs">
                        <p>Event ini dipersembahkan oleh</p>
                        <p>Tim Manajemen Event</p>
                    </div>
                    </div>
                </div>

                
                <div class="absolute -left-2 top-1/4 bottom-1/4 flex flex-col justify-around">
                    <div class="w-4 h-4 bg-white border border-blue-950 rounded-full"></div>
                    <div class="w-4 h-4 bg-white border border-blue-950 rounded-full"></div>
                    <div class="w-4 h-4 bg-white border border-blue-950 rounded-full"></div>
                </div>
                </div>

                <div class="mt-8 text-center text-gray-600 italic text-sm">
                *Tiket ini dapat dibeli setelah tanggal peluncuran
                </div>
            </div>
            @endforeach

        </div>

      @else

        <div class="w-full flex items-center justify-center text-gray-500">
          <p>Output tiket akan muncul di sini setelah form dikirim</p>
        </div>

      @endif

    </div>
  </div>

  <div class="w-full justify-center items-center py-3 text-center my-10">
    <a href="/" class="text-md font-semibold text-blue-950 text-center bg-white border border-cyan-500 py-2 px-4 rounded">Back Home</a>
  </div>

</div>

@endsection

@section('bawahkelompok3', 'Copyright  2025 Kelompok 3')