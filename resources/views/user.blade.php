@extends('layouts.kelompok3')

@section('ataskelompok3', 'Daftar Pengguna')

@section('tengahkelompok3')

<div class="min-h-[80vh] bg-gradient-to-tr from-gray-100 to-white px-4 py-8">
  <div class="w-full max-w-7xl mx-auto bg-white shadow-xl border border-gray-300 rounded-2xl p-8 space-y-6">
    
    <!-- Header -->
    <div class="text-center  pb-6">
      <h2 class="text-3xl font-bold text-gray-800">Daftar Pengguna</h2>
      <p class="text-sm text-gray-500 mt-2">Kelola data pengguna Eventix dengan mudah</p>
    </div>

    <!-- Success Alert -->
    @if (session('success'))
      <div class="bg-green-50 border border-green-200 rounded-xl p-4 mb-4" id="success-alert">
        <div class="flex items-center">
          <div class="flex-shrink-0">
            <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
          </div>
          <div class="ml-3">
            <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
          </div>
          <div class="ml-auto pl-3">
            <button type="button" onclick="closeAlert('success-alert')" class="inline-flex bg-green-50 rounded-md p-1.5 text-green-500 hover:bg-green-100 focus:outline-none">
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
              </svg>
            </button>
          </div>
        </div>
      </div>
    @endif

    <!-- Error Alert -->
    @if (session('error'))
      <div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-4" id="error-alert">
        <div class="flex items-center">
          <div class="flex-shrink-0">
            <svg class="w-5 h-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
            </svg>
          </div>
          <div class="ml-3">
            <p class="text-sm font-medium text-red-800">{{ session('error') }}</p>
          </div>
          <div class="ml-auto pl-3">
            <button type="button" onclick="closeAlert('error-alert')" class="inline-flex bg-red-50 rounded-md p-1.5 text-red-500 hover:bg-red-100 focus:outline-none">
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
              </svg>
            </button>
          </div>
        </div>
      </div>
    @endif


    <!-- Table -->
    <div class="overflow-x-auto">
      <table class="min-w-full bg-white border border-gray-200 rounded-xl overflow-hidden">
        <thead class="bg-gray-50">
          <tr>
            <th class="py-4 px-6 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Foto</th>
            <th class="py-4 px-6 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nama Lengkap</th>
            <th class="py-4 px-6 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">NIM</th>
            <th class="py-4 px-6 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Email</th>
            <th class="py-4 px-6 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Password</th>
            <th class="py-4 px-6 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Hak Akses</th>
            <th class="py-4 px-6 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          @foreach($user_view as $index => $user)
          <tr class="hover:bg-gray-50 transition-colors duration-200">
            <!-- Foto -->
            <td class="py-4 px-6 whitespace-nowrap">
              <div class="flex items-center">
                @if($user->foto)
                  <img src="{{ asset( $user->foto) }}" alt="Foto {{ $user->nama }}" 
                       class="w-12 h-12 rounded-full object-cover border-2 border-gray-200 shadow-sm cursor-pointer"
                       onclick="showImageModal('{{ asset( $user->foto) }}', '{{ $user->nama }}')">
                @else
                  <div class="w-12 h-12 rounded-full bg-gradient-to-r from-blue-400 to-purple-500 flex items-center justify-center text-white font-semibold text-lg">
                    {{ strtoupper(substr($user->nama, 0, 1)) }}
                  </div>
                @endif
              </div>
            </td>
            
            <!-- Nama -->
            <td class="py-4 px-6 whitespace-nowrap">
              <div class="text-sm font-medium text-gray-900">{{ $user->nama }}</div>
            </td>
            
            <!-- NIM -->
            <td class="py-4 px-6 whitespace-nowrap">
              <div class="text-sm text-gray-700 font-mono">{{ $user->nim ?? 'N/A' }}</div>
            </td>
            
            <!-- Email -->
            <td class="py-4 px-6 whitespace-nowrap">
              <div class="text-sm text-gray-700">{{ $user->email }}</div>
            </td>
            
            <!-- Password dengan Show/Hide -->
            <td class="py-4 px-6 whitespace-nowrap">
              <div class="flex items-center space-x-2">
                <input type="password" 
                       value="{{ $user->password }}" 
                       id="password-{{ $index }}" 
                       class="text-sm text-gray-700 bg-transparent border-none outline-none font-mono w-24" 
                       readonly>
                <button type="button" 
                        onclick="togglePassword({{ $index }})" 
                        class="text-gray-400 hover:text-gray-600 focus:outline-none transition-colors duration-200"
                        id="toggle-{{ $index }}">
                  <!-- Eye Closed Icon -->
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"/>
                  </svg>
                </button>
              </div>
            </td>
            
            <!-- Hak Akses -->
            <td class="py-4 px-6 whitespace-nowrap">
              @if($user->hak_akses === 'admin')
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                  <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                  </svg>
                  Admin
                </span>
              @else
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                  <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                  </svg>
                  User
                </span>
              @endif
            </td>
            
            <!-- Aksi -->
            <td class="py-4 px-6 whitespace-nowrap text-center">
              <div class="flex items-center justify-center space-x-2">
                {{-- <button onclick="openEditModal({{ $user->user_id }})" 
                        class="inline-flex items-center px-3 py-2 border border-transparent text-xs leading-4 font-medium rounded-lg text-white bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-colors duration-200">
                  <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                  </svg>
                  Edit
                </button> --}}
                <form method="POST" action="{{ route('user.delete', $user->user_id) }}" class="inline-block">
                  @csrf
                  @method('DELETE')
                  <button type="submit" 
                          onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna {{ $user->nama }}?')"
                          class="inline-flex items-center px-3 py-2 border border-transparent text-xs leading-4 font-medium rounded-lg text-white bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors duration-200">
                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                    Delete
                  </button>
                </form>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      
      @if($user_view->isEmpty())
        <div class="text-center py-12">
          <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13-1a4 4 0 11-8 0 4 4 0 018 0z"/>
          </svg>
          <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada pengguna</h3>
          <p class="mt-1 text-sm text-gray-500">Belum ada data pengguna yang terdaftar.</p>
        </div>
      @endif
    </div>

  </div>
</div>

{{-- <!-- Modal Edit User -->
<div id="editModal" class="fixed inset-0 flex items-center justify-center bg-gray-500/50 hidden z-50">
  <div class="bg-white p-6 rounded-xl shadow-xl w-full max-w-md mx-4 max-h-[90vh] overflow-y-auto">
    <div class="flex justify-between items-center mb-6">
      <h3 class="text-xl font-semibold text-gray-800">Edit Pengguna</h3>
      <button onclick="closeEditModal()" class="text-gray-400 hover:text-gray-600">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
      </button>
    </div>
    
    <form method="POST" id="editForm" action="" class="space-y-4" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <!-- Foto Pengguna -->
      <div class="text-center">
        <div class="relative inline-block">
          <img id="editFoto" src="" alt="Foto Pengguna" class="w-20 h-20 rounded-full mx-auto object-cover border-4 border-gray-200 shadow-lg">
          <div class="absolute inset-0 bg-black bg-opacity-0 hover:bg-opacity-30 rounded-full transition-all duration-200 flex items-center justify-center cursor-pointer" onclick="document.getElementById('editFotoInput').click()">
            <svg class="w-6 h-6 text-white opacity-0 hover:opacity-100 transition-opacity duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
          </div>
        </div>
        <input type="file" id="editFotoInput" name="foto" class="hidden" accept="image/*" onchange="previewEditImage(this)">
        <p class="text-xs text-gray-500 mt-2">Klik foto untuk mengubah</p>
      </div>

      <div>
        <label for="editNama" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
        <input type="text" id="editNama" name="nama" required
          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200">
      </div>

      <div>
        <label for="editNim" class="block text-sm font-medium text-gray-700">NIM</label>
        <input type="number" id="editNim" name="nim" required
          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200">
      </div>

      <div>
        <label for="editEmail" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" id="editEmail" name="email" required
          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200">
      </div>

      <div>
        <label for="editHakAkses" class="block text-sm font-medium text-gray-700">Hak Akses</label>
        <select id="editHakAkses" name="hak_akses" required
          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200">
          <option value="admin">Admin</option>
          <option value="user">User</option>
        </select>
      </div>

      <div>
        <label for="editPassword" class="block text-sm font-medium text-gray-700">Password (Kosongkan jika tidak ingin mengubah)</label>
        <input type="password" id="editPassword" name="password" 
          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200">
      </div>

      <div class="flex space-x-3 pt-4">
        <button type="submit" 
          class="flex-1 bg-blue-500 hover:bg-blue-600 text-white font-medium py-2.5 px-4 rounded-xl transition duration-200">
          <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
          </svg>
          Simpan
        </button>
        <button type="button" onclick="closeEditModal()" 
          class="flex-1 bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium py-2.5 px-4 rounded-xl transition duration-200">
          <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
          </svg>
          Batal
        </button>
      </div>
    </form>
  </div>
</div>

<!-- Modal Image Viewer -->
<div id="imageModal" class="fixed max-h-screen max-w-screen p-10 inset-0 flex items-center justify-center bg-black/90 hidden z-50" onclick="closeImageModal()">
  <div class="relative max-w-4xl max-h-full p-4">
    <img id="modalImage" src="" alt="" class="max-w-[500px] max-h-auto object-contain rounded-lg shadow-xl">
    <button onclick="closeImageModal()" class="absolute top-4 right-4 text-white bg-black bg-opacity-50 rounded-full p-2 hover:bg-opacity-75 transition-all duration-200">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
      </svg>
    </button>
    <div id="modalCaption" class="absolute bottom-4 left-1/2 transform -translate-x-1/2 text-white bg-black bg-opacity-50 px-4 py-2 rounded-lg"></div>
  </div>
</div> --}}

<script>
  // Toggle Password Visibility
  function togglePassword(index) {
    const passwordField = document.getElementById(`password-${index}`);
    const toggleButton = document.getElementById(`toggle-${index}`);
    
    if (passwordField.type === 'password') {
      passwordField.type = 'text';
      toggleButton.innerHTML = `
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
        </svg>
      `;
    } else {
      passwordField.type = 'password';
      toggleButton.innerHTML = `
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"/>
        </svg>
      `;
    }
  }

  // Edit Modal Functions
  function openEditModal(userId) {
    fetch(`/user_view/${userId}/edit`)
      .then(response => response.json())
      .then(user => {
        document.getElementById('editNama').value = user.nama;
        document.getElementById('editNim').value = user.nim || '';
        document.getElementById('editEmail').value = user.email;
        document.getElementById('editHakAkses').value = user.hak_akses;
                // Menampilkan foto di modal
        const fotoPath = user.foto ? `/storage/${user.foto.replace('public/', '')}` : '';
        document.getElementById('editFoto').src = fotoPath;

        // Set form action untuk update
        document.getElementById('editForm').action = `/user_view/${user.user_id}`;

        // Menampilkan modal edit
        document.getElementById('editModal').classList.remove('hidden');
      });
  }

  function closeEditModal() {
    document.getElementById('editModal').classList.add('hidden');
  }

  // Image Modal Functions
  function showImageModal(imgSrc, imgName) {
    document.getElementById('modalImage').src = imgSrc;
    document.getElementById('modalCaption').textContent = imgName;
    document.getElementById('imageModal').classList.remove('hidden');
  }

  function closeImageModal() {
    document.getElementById('imageModal').classList.add('hidden');
  }

  // Close alert message after a timeout
  function closeAlert(alertId) {
    setTimeout(() => {
      document.getElementById(alertId).classList.add('hidden');
    }, 3000); // Hide alert after 3 seconds
  }

  // Preview selected image before uploading in modal
  function previewEditImage(input) {
    if (input.files && input.files[0]) {
      const reader = new FileReader();
      reader.onload = function(e) {
        document.getElementById('editFoto').src = e.target.result;
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>

@endsection
