@extends('layouts.kelompok3')

@section('ataskelompok3', 'Form 592')

@section('tengahkelompok3')

<div class="bg-gradient-to-br from-blue-50 to-cyan-50 w-full p-5 min-h-screen">
  <div class="max-w-screen-xl bg-white mx-auto shadow-xl rounded-2xl border border-gray-200 mt-5 overflow-hidden">

    <!-- Header -->
    <div class="w-full bg-blue-950 justify-center items-center py-4 px-4">
      <div class="text-center">
        <h1 class="text-xl font-bold text-white mb-2">Pemesanan Tiket 2025</h1>
        {{-- <h2 class="text-lg font-medium text-blue-200">BTOB FAN-CON 3 2 1 GO! MELympic in JAKARTA</h2> --}}
      </div>
    </div>

    <div class="">
      <!-- Form Section -->
      <div class="mb-12">


        <form method="POST" action="{{ url('/buytiket_592') }}" enctype="multipart/form-data" class="bg-gray-50 rounded-xl p-6 border border-gray-100">
          @csrf
          
          <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Left Column -->
            <div class="space-y-6">
              <!-- Personal Info -->
              <div class="bg-white rounded-lg p-5 ">

                
                <div class="space-y-4">
                  <div>
                    <label for="nama_592" class="block text-gray-700 font-medium mb-2">Nama Lengkap</label>
                    <input type="text" name="nama_592" id="nama_592" value="{{ old('nama_592') }}" required
                      class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                      placeholder="Masukkan nama lengkap Anda" />
                    @error('nama_592')
                      <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                  </div>

                  <div>
                    <label for="email_592" class="block text-gray-700 font-medium mb-2">Email</label>
                    <input type="email" name="email_592" id="email_592" value="{{ old('email_592') }}" required
                      class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                      placeholder="contoh@email.com" />
                    @error('email_592')
                      <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                  </div>

                  <div>
                    <label for="telepon_592" class="block text-gray-700 font-medium mb-2">Nomor Telepon</label>
                    <input type="text" name="telepon_592" id="telepon_592" value="{{ old('telepon_592') }}" required
                      class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                      placeholder="08xxxxxxxxxx" />
                    @error('telepon_592')
                      <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                  </div>

                  <!-- Upload Foto -->
                  <div>
                    <label for="foto_592" class="block text-gray-700 font-medium mb-2">Foto Identitas</label>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 hover:border-blue-500 transition duration-200">
                      <input type="file" name="foto_592" id="foto_592" accept="image/*"
                        class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                      <p class="text-gray-500 text-xs mt-2">Format: JPG, PNG, PDF (Max 2MB)</p>
                    </div>
                    @error('foto_592')
                      <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
              </div>
            </div>

            <!-- Right Column -->
            <div class="space-y-6">
              <!-- Ticket Info -->
              <div class="bg-white rounded-lg p-5 ">


                <div class="space-y-4">
                  <div>
                    <label for="jenis_tiket_592" class="block text-gray-700 font-medium mb-2">Jenis Tiket</label>
                    <select name="jenis_tiket_592" id="jenis_tiket_592" 
                      class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                      <option value="">Pilih Jenis Tiket</option>
                      <option value="regular" {{ old('jenis_tiket_592') == 'regular' ? 'selected' : '' }}>Regular - Rp 350.000</option>
                      <option value="vip" {{ old('jenis_tiket_592') == 'vip' ? 'selected' : '' }}>VIP - Rp 750.000</option>
                      <option value="platinum" {{ old('jenis_tiket_592') == 'platinum' ? 'selected' : '' }}>Platinum - Rp 1.500.000</option>
                    </select>
                    @error('jenis_tiket_592')
                      <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                  </div>

                  <div>
                    <label for="jumlah_592" class="block text-gray-700 font-medium mb-2">Jumlah Tiket</label>
                    <input type="number" id="jumlah_592" name="jumlah_592" min="1" max="10" value="{{ old('jumlah_592') }}" required
                      class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                      placeholder="Maksimal 10 tiket" />
                    @error('jumlah_592')
                      <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                  </div>

                  <div>
                    <label for="metode_592" class="block text-gray-700 font-medium mb-2">Metode Pembayaran</label>
                    <select name="metode_592" id="metode_592" 
                      class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                      <option value="">Pilih Metode Pembayaran</option>
                      <option value="transfer" {{ old('metode_592') == 'transfer' ? 'selected' : '' }}>Transfer Bank</option>
                      <option value="ewallet" {{ old('metode_592') == 'ewallet' ? 'selected' : '' }}>E-Wallet (OVO, GoPay, Dana)</option>
                      <option value="credit" {{ old('metode_592') == 'credit' ? 'selected' : '' }}>Kartu Kredit</option>
                    </select>
                    @error('metode_592')
                      <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
              </div>


            </div>
          </div>

          <!-- Submit Button -->
          <div class="mt-8 flex justify-center">
            <button type="submit" 
              class="bg-gradient-to-r from-cyan-600 to-blue-600 hover:from-cyan-700 hover:to-blue-700 text-white font-bold py-4 px-8 rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition duration-300 focus:outline-none focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50">
              <span class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                Beli Sekarang
              </span>
            </button>
          </div>
        </form>
      </div>

      <!-- Data Table Section -->
      <div>


        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
          <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
            <h4 class="text-lg font-semibold text-gray-700">Daftar Pemesanan Tiket</h4>
          </div>
          
          <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                  <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                  <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                  <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Telepon</th>
                  <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Tiket</th>
                  <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah</th>
                  <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Harga</th>
                  <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Metode Bayar</th>
                  <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Foto</th>
                  <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                @forelse($pesanan ?? [] as $index => $item)
                <tr class="hover:bg-gray-50 transition duration-200">
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $index + 1 }}</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->nama_592 }}</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->email_592 }}</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->telepon_592 }}</td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                      @if($item->jenis_tiket_592 == 'regular') bg-green-100 text-green-800
                      @elseif($item->jenis_tiket_592 == 'vip') bg-blue-100 text-blue-800
                      @else bg-purple-100 text-purple-800 @endif">
                      {{ ucfirst($item->jenis_tiket_592) }}
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->jumlah_592 }}</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    Rp {{ number_format($item->total_harga ?? 0, 0, ',', '.') }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ ucfirst($item->metode_592) }}</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    @if($item->foto_592)
                      <img src="{{ asset($item->foto_592) }}" alt="Foto ID" class="w-10 h-10 rounded-full object-cover">
                    @else
                      <span class="text-gray-400">-</span>
                    @endif
                  </td>

                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">

                    <form action="{{ route('item592.delete', $item->id ) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" class="text-red-500 hover:text-red-600">
                        delete
                      </button>
                    </form>

                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="11" class="px-6 py-12 text-center text-gray-500">
                    <div class="flex flex-col items-center">
                      <svg class="w-12 h-12 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                      </svg>
                      <p class="text-lg font-medium">Belum ada data pemesanan</p>
                      <p class="text-sm">Data pemesanan akan muncul di sini setelah form disubmit</p>
                    </div>
                  </td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection

@section('bawahkelompok3', 'Copyright 2025 Kelompok 3')