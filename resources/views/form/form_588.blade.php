@extends('layouts.kelompok3')

@section('ataskelompok3', 'Form 588')

@section('tengahkelompok3')

<div class="bg-gradient-to-br from-blue-50 to-cyan-50 w-full p-5 min-h-screen">
  <div class="max-w-screen-lg bg-white mx-auto shadow-xl rounded-2xl border border-gray-200 mt-5 overflow-hidden">

    <!-- Header -->
    <div class="w-full bg-blue-950 justify-center items-center py-4 px-4">
      <div class="text-center">
        <h1 class="text-xl font-bold text-white ">Pembuatan Tiket Event</h1>
      </div>
    </div>

    <!-- Form Section -->
    <div class="p-6 bg-gray-50">
      <form method="POST" action="{{ url('/tiket_588') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
          <!-- Left Column -->
          <div class="space-y-6">
            <div>
              <label for="namaEvent_588" class="block text-gray-700 font-medium mb-2">Nama Event</label>
              <input
                type="text"
                name="namaEvent_588"
                id="namaEvent_588"
                value="{{ old('namaEvent_588') }}"
                required
                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                placeholder="Masukkan nama event" />
              @error('namaEvent_588')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
              <label for="kategori_588" class="block text-gray-700 font-medium mb-2">Kategori Event</label>
              <select
                name="kategori_588"
                id="kategori_588"
                required
                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                <option value="">Pilih Kategori</option>
                <option value="konser" {{ old('kategori_588')=='konser'?'selected':'' }}>Konser Musik</option>
                <option value="festival" {{ old('kategori_588')=='festival'?'selected':'' }}>Festival</option>
                <option value="seminar" {{ old('kategori_588')=='seminar'?'selected':'' }}>Seminar</option>
                <option value="workshop" {{ old('kategori_588')=='workshop'?'selected':'' }}>Workshop</option>
                <option value="pameran" {{ old('kategori_588')=='pameran'?'selected':'' }}>Pameran</option>
              </select>
              @error('kategori_588')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
              <label for="tanggal_588" class="block text-gray-700 font-medium mb-2">Tanggal Event</label>
              <input
                type="date"
                name="tanggal_588"
                id="tanggal_588"
                value="{{ old('tanggal_588') }}"
                required
                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200" />
              @error('tanggal_588')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>
          </div>

          <!-- Right Column -->
          <div class="space-y-6">
            <div>
              <label for="lokasi_588" class="block text-gray-700 font-medium mb-2">Lokasi</label>
              <input
                type="text"
                name="lokasi_588"
                id="lokasi_588"
                value="{{ old('lokasi_588') }}"
                required
                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                placeholder="Masukkan lokasi event" />
              @error('lokasi_588')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
              <label for="harga_588" class="block text-gray-700 font-medium mb-2">Harga Tiket (Rp)</label>
              <input
                type="number"
                name="harga_588"
                id="harga_588"
                value="{{ old('harga_588') }}"
                required
                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                placeholder="Masukkan harga_588 tiket" />
              @error('harga_588')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
              <label for="stok_588" class="block text-gray-700 font-medium mb-2">Jumlah Stok</label>
              <input
                type="number"
                name="stok_588"
                id="stok_588"
                value="{{ old('stok_588') }}"
                required
                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                placeholder="Masukkan jumlah stok_588" />
              @error('stok_588')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
              <label for="status_588" class="block text-gray-700 font-medium mb-2">Status Tiket</label>
              <select
                name="status_588"
                id="status_588"
                required
                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                <option value="">Pilih Status</option>
                <option value="tersedia" {{ old('status_588')=='tersedia'?'selected':'' }}>Tersedia</option>
                <option value="segera" {{ old('status_588')=='segera'?'selected':'' }}>Segera Hadir</option>
                <option value="terbatas" {{ old('status_588')=='terbatas'?'selected':'' }}>Stok Terbatas</option>
                <option value="habis" {{ old('status_588')=='habis'?'selected':'' }}>Habis</option>
              </select>
              @error('status_588')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <!-- Upload Foto -->
            <div>
              <label for="foto_588" class="block text-gray-700 font-medium mb-2">Upload Poster/Event Foto</label>
              <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 hover:border-blue-500 transition duration-200">
                <input
                  type="file"
                  name="foto_588"
                  id="foto_588"
                  accept="image/*"
                  class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
              </div>
              @error('foto_588')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>
          </div>
        </div>

        <!-- Submit Button -->
        <div class="mt-8 flex justify-center">
          <button
            type="submit"
            class="bg-gradient-to-r from-cyan-600 to-blue-600 hover:from-cyan-700 hover:to-blue-700 text-white font-bold py-4 px-8 rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition duration-300 focus:outline-none focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50">
            <span class="flex items-center">
              <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
              </svg>
              Buat Tiket
            </span>
          </button>
        </div>
      </form>
    </div>

    <!-- Data Table Section -->
    <div class="p-6 bg-white">
      <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Event</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lokasi</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stok</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Foto</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            @forelse($tickets ?? [] as $index => $item)
            <tr class="hover:bg-gray-50 transition duration-200">
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                {{ $index+1 }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                {{ $item->namaEvent }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                {{ ($item->kategori) }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                {{ $item->tanggal }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                {{ $item->lokasi }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                Rp {{ number_format($item->harga,0,',','.') }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                {{ $item->stok }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                {{ ($item->status) }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                @if($item->foto)
                  <img src="{{ asset( $item->foto ) }}" alt="Poster" class="w-12 h-12 rounded-md object-cover" />
                @else
                  <span class="text-gray-400">-</span>
                @endif
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                <form action="{{ route('tiket_588.destroy', $item->id) }}" method="POST">
                  @csrf @method('DELETE')
                  <button type="submit" onclick="return confirm('Yakin ingin menghapus?')" class="text-red-500 hover:text-red-700">Hapus</button>
                </form>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="10" class="px-6 py-12 text-center text-gray-500">Belum ada data tiket</td>
            </tr>
            @endforelse
            
          </tbody>
        </table>
      </div>
    </div>

  </div>
</div>

@endsection

@section('bawahkelompok3', 'Copyright 2025 Kelompok 3')
