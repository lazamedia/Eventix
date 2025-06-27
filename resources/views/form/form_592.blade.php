@extends('layouts.kelompok3')

@section('ataskelompok3', 'Form 592')

@section('tengahkelompok3')

<div class="bg-gray-50 border border-x-4 rounded-md border-gray-400 border-x-cyan-700 shadow p-5 flex flex-col sm:flex-row items-center sm:items-start sm:justify-center gap-5 sm:gap-20 max-w-screen-lg mx-5 lg:mx-auto my-5">
    <img src="{{ session('foto') }}" class="rounded-full w-24 h-24 border border-cyan-500 shadow-md object-cover shadow-cyan-500" alt="Foto Profil">
    <div class="text-center sm:text-left">
        <h1 class="text-2xl mb-2 text-gray-950 font-light">Form Pemesanan Tiket</h1>
        <p class="text-lg font-bold text-gray-700">Nama : {{ session('nama') }}</p>
        <p class="text-gray-600">NIM : {{ session('nim') }}</p>
    </div>
</div>


<div class="bg-gray-200 w-full p-5">
  <div class="max-w-screen-lg bg-white mx-auto shadow rounded-lg border border-gray-300 mt-5">

    <div class="w-full bg-blue-950 justify-center items-center rounded-t-lg py-3">
      <h1 class="text-md font-semibold text-white text-center">Pemesanan Tiket 2025 BTOB FAN-CON 3 2 1 GO! MELympic in JAKARTA</h1>
    </div>

    <div class="gap-3 grid grid-cols-1 md:grid-cols-2 p-6">

      <!-- Form Input -->
      <form method="POST" action="{{ url('/buytiket_592') }}" class="">
        @csrf
        <div class="space-y-4">
          <div>
            <label for="nama_592" class="block text-gray-700 font-semibold mb-1">Nama Lengkap</label>
            <input type="text" name="nama_592" id="nama_592" value="{{ old('nama_592') }}" required
              class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 " />
            @error('nama_592')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <label for="email_592" class="block text-gray-700 font-semibold mb-1">Email</label>
            <input type="email" name="email_592" id="email_592" value="{{ old('email_592') }}" required
              class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 " />
            @error('email_592')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <label for="telepon_592" class="block text-gray-700 font-semibold mb-1">Nomor Telepon</label>
            <input type="text" name="telepon_592" id="telepon_592" value="{{ old('telepon_592') }}" required
              class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 " />
            @error('telepon_592')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <label for="jenis_tiket_592" class="block text-gray-700 font-semibold mb-1">Jenis Tiket</label>
            <select name="jenis_tiket_592" id="jenis_tiket_592" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 ">
              <option value="regular" {{ old('jenis_tiket_592') == 'regular' ? 'selected' : '' }}>Regular - Rp 350.000</option>
              <option value="vip" {{ old('jenis_tiket_592') == 'vip' ? 'selected' : '' }}>VIP - Rp 750.000</option>
              <option value="platinum" {{ old('jenis_tiket_592') == 'platinum' ? 'selected' : '' }}>Platinum - Rp 1.500.000</option>
            </select>
            @error('jenis_tiket_592')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
              <label for="jumlah_592" class="block text-gray-700 font-semibold mb-1">Jumlah Tiket</label>
              <input type="number" id="jumlah_592" name="jumlah_592" min="1" max="10" value="{{ old('jumlah_592') }}" required
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 " />
              @error('jumlah_592')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
              @enderror
          </div>

          <div>
            <label for="metode_592" class="block text-gray-700 font-semibold mb-1">Metode Pembayaran</label>
            <select name="metode_592" id="metode_592" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 ">
              <option value="">Pilih Metode Pembayaran</option>
              <option value="transfer" {{ old('metode_592') == 'transfer' ? 'selected' : '' }}>Transfer Bank</option>
              <option value="ewallet" {{ old('metode_592') == 'ewallet' ? 'selected' : '' }}>E-Wallet</option>
              <option value="credit" {{ old('metode_592') == 'credit' ? 'selected' : '' }}>Kartu Kredit</option>
            </select>
            @error('metode_592')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>

          <button type="submit" class="w-full bg-cyan-600 hover:bg-cyan-700 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">Beli sekarang</button>
        </div>
      </form>

      <!-- Hasil Output dari Object !empty($tampilkan) && count($tampilkan) > 0 -->
      @if (!empty($tampilkan))

        <div class="w-full">
          <!-- Menampilkan Output -->
          
            @foreach ($tampilkan as $data)
                <div class="w-full">
                  <div class="relative mx-auto max-w-md transform transition-transform duration-300 overflow-hidden">
                      <div class="rounded-lg overflow-hidden shadow-xl border-2 border-gray-400">
                          <div class="bg-cyan-600 p-4 text-left">
                              <h2 class="text-white text-xl font-bold tracking-wider">2025 BTOB FAN-CON 3 2 1 GO! MELympic in JAKARTA</h2>
                              <p class="text-gray-200 text-sm">2025</p>
                          </div>

                          <div class="p-5 bg-white bg-opacity-10 backdrop-blur-sm">
                              <div class="flex justify-between items-center mb-4">
                                  <div>
                                      <p class="text-blue-950 text-xs uppercase">Nama</p>
                                      <p class="text-blue-950 font-bold" id="ticket-name">{{ $data['nama'] }}</p>
                                  </div>
                                  <div class="bg-yellow-300 text-black font-bold py-1 px-3 rounded-full text-xs uppercase">{{ $data['jenis_tiket'] }}</div>
                              </div>

                              <div class="flex justify-between mb-4">
                                  <div>
                                      <p class="text-blue-950 text-xs uppercase">Email</p>
                                      <p class="text-blue-950 font-bold">{{ $data['email'] }}</p>
                                  </div>
                                  <div>
                                      <p class="text-blue-950 text-xs uppercase">Jumlah Tiket</p>
                                      <p class="text-blue-950 font-bold">{{ $data['jumlahTiket'] }}</p>
                                  </div>
                              </div>

                              <div class="mb-4">
                                  <p class="text-blue-950 text-xs uppercase">Nomor Telepon</p>
                                  <p class="text-blue-950 font-bold">{{ $data['telepon'] }}</p>
                              </div>

                              <div>
                                  <p class="text-blue-950 text-xs uppercase">Pembayaran</p>
                                  <p class="text-blue-950 font-bold">{{ $data['metodePembayaran'] }}</p>
                              </div>
                          </div>

                          <div class="border-t border-dashed border-gray-300 p-4 flex justify-between items-center bg-gray-200">
                              <div>
                                  <p class="text-gray-700 text-xs">Powered by</p>
                                  <p class="text-gray-700 font-bold text-sm">EVENTIX</p>
                              </div>
                              <div class="text-blue-950 text-xs">
                                  <p>Tiket ini adalah bukti sah pembelian</p>
                                  <p>Dilarang diperjualbelikan kembali</p>
                              </div>
                          </div>
                      </div>

                      <div class="absolute -left-2 top-1/4 bottom-1/4 flex flex-col justify-around">
                          <div class="w-4 h-4 bg-white border border-blue-950 rounded-full"></div>
                          <div class="w-4 h-4 bg-white border border-blue-950 rounded-full"></div>
                          <div class="w-4 h-4 bg-white border border-blue-950 rounded-full"></div>
                      </div>
                      </div>

                </div>
            @endforeach          
          
          <!-- Menampilkan status menggunakan method dari object turunan -->
          <div class="mt-4">
            <p class='text-sm text-green-600 text-center'>Pesanan Atas Nama {{ $data['nama'] }}, dengan tipe tiket {{ $data['jenis_tiket'] }} berhasil dibuat ! </p>
          </div>
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


@section('bawahkelompok3', 'Copyright &copy; 2023 Kelompok 3')