<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Session Viewer - Laravel</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap');
    
    body {
      font-family: 'Inter', sans-serif;
      background-color: #0f172a;
    }
    
    .card-hover:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
    }
    
    .json-viewer {
      background: #020617;
      color: #e2e8f0;
      font-family: 'Monaco', 'Menlo', monospace;
      border-radius: 8px;
      padding: 16px;
      font-size: 13px;
      overflow-x: auto;
      border: 1px solid #334155;
    }
  </style>
</head>
<body class="bg-slate-900 min-h-screen text-gray-100">

  <!-- Header -->
  <div class="bg-slate-800 border-b border-slate-700 fixed top-0 left-0 right-0 z-50">
    <div class="max-w-4xl mx-auto px-6 py-6">
      <div class="flex items-center justify-between">
        <div class="flex items-center space-x-3">
          <div class="w-10 h-10 bg-red-500 rounded-lg flex items-center justify-center">
            <i class="fa-brands fa-laravel text-white text-lg"></i>
          </div>
          <div>
            <h1 class="text-xl font-semibold text-white">Laravel Session</h1>
            <p class="text-slate-400 text-sm">Monitor data session aktif</p>
          </div>
        </div>

        @if (count(session()->all()) > 0)
          <div class="flex items-center space-x-2">
            <form action="{{ route('session.clear') }}" method="POST" class="inline">
              @csrf
              <button type="button" onclick="confirmClear(this.form)" 
                class="text-red-400/70 text-sm">
                <i class="fa-solid fa-trash mr-2 text-red-400/70"></i>
                Clear
              </button>
            </form>
          </div>
        @endif

        {{-- <div class="flex items-center space-x-2">
          <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
          <span class="text-slate-300 text-sm">Live</span>
        </div> --}}

      </div>
    </div>
  </div>

  <div class="max-w-4xl mx-auto px-6 py-8 mt-[90px]">
    
    <!-- Alert Message -->
    @if (session()->has('message'))
      <div class="bg-green-900/50 border border-green-700 rounded-lg p-4 mb-6">
        <div class="flex items-center">
          <i class="fa-solid fa-check-circle text-green-400 mr-2"></i>
          <p class="text-green-300 text-sm">{{ session('message') }}</p>
        </div>
      </div>
    @endif

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
      <div class="bg-slate-800 border border-slate-700 rounded-lg p-6 shadow-sm card-hover transition-all duration-200">
        <div class="flex items-center">
          <div class="p-2  rounded-lg">
            <i class="fa-solid fa-database text-blue-400"></i>
          </div>
          <div class="ml-4">
            <p class="text-sm font-medium text-slate-400">Total Items</p>
            <p class="text-xl font-semibold text-white">{{ count(session()->all()) }}</p>
          </div>
        </div>
      </div>

      <div class="bg-slate-800 border border-slate-700 rounded-lg p-6 shadow-sm card-hover transition-all duration-200">
        <div class="flex items-center">
          <div class="p-2  rounded-lg">
            <i class="fa-solid fa-id-card text-purple-400"></i>
          </div>
          <div class="ml-4">
            <p class="text-sm font-medium text-slate-400">Session ID</p>
            <p class="text-sm font-mono text-slate-200 truncate w-32">{{ substr(session()->getId(), 0, 12) }}...</p>
          </div>
        </div>
      </div>

      <div class="bg-slate-800 border border-slate-700 rounded-lg p-6 shadow-sm card-hover transition-all duration-200">
        <div class="flex items-center">
          <div class="p-2  rounded-lg">
            <i class="fa-solid fa-check-circle text-green-400"></i>
          </div>
          <div class="ml-4">
            <p class="text-sm font-medium text-slate-400">Status</p>
            <p class="text-sm font-medium text-green-400">Active</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Session Data -->
    <div class="bg-slate-800 border border-slate-700 rounded-lg shadow-sm overflow-hidden">
      <div class="px-6 py-4 border-b border-slate-700 bg-slate-900/50">
        <div class="flex items-center justify-between">
          <h2 class="text-lg font-medium text-white">
            <i class="fa-solid fa-list mr-2 text-slate-400"></i>
            Session Data
          </h2>
          <button onclick="toggleView()" class="text-slate-400 hover:text-slate-300 text-sm px-3 py-1 rounded border border-slate-600 hover:bg-slate-700 transition-colors">
            <i class="fa-solid fa-code mr-1"></i>
            <span id="viewToggle">Raw JSON</span>
          </button>
        </div>
      </div>

      <div class="p-6">
        @if (count(session()->all()) > 0)
          <!-- Normal View -->
          <div id="normalView">
            <div class="space-y-4">
              @foreach (session()->all() as $key => $value)
                <div class="border border-slate-600 rounded-lg p-4 hover:bg-slate-700/50 transition-colors">
                  <div class="flex items-start justify-between mb-2">
                    <div class="flex items-center space-x-3">
                      <h3 class="font-medium text-slate-200">{{ $key }}</h3>
                      <span class="text-xs px-2 py-1 bg-slate-700 text-slate-300 rounded-full border border-slate-600">
                        @if (is_array($value)) Array
                        @elseif (is_string($value)) String
                        @elseif (is_numeric($value)) Number
                        @elseif (is_bool($value)) Boolean
                        @else Object
                        @endif
                      </span>
                    </div>
                    <button onclick="copyValue('{{ addslashes($key) }}')" class="text-slate-400 hover:text-slate-300 transition-colors">
                      <i class="fa-solid fa-copy text-sm"></i>
                    </button>
                  </div>
                  
                  <div class="value-container" data-key="{{ $key }}">
                    @if (is_array($value))
                      <div class="json-viewer">{{ json_encode($value, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</div>
                    @elseif (is_bool($value))
                      <span class="inline-flex items-center px-2 py-1 rounded text-sm {{ $value ? 'bg-green-900/50 text-green-300 border border-green-700' : 'bg-red-900/50 text-red-300 border border-red-700' }}">
                        <i class="fa-solid fa-{{ $value ? 'check' : 'times' }} mr-1"></i>
                        {{ $value ? 'true' : 'false' }}
                      </span>
                    @elseif (is_string($value) && strlen($value) > 100)
                      <div class="bg-slate-900 border border-slate-600 rounded p-3">
                        <p class="text-slate-300 text-sm">{{ Str::limit($value, 100) }}</p>
                        <button onclick="toggleFullText(this)" class="text-blue-400 hover:text-blue-300 text-xs mt-2">
                          Lihat selengkapnya
                        </button>
                        <div class="hidden full-text mt-2">
                          <p class="text-slate-300 text-sm">{{ $value }}</p>
                        </div>
                      </div>
                    @else
                      <span class="text-slate-200 font-mono text-sm">{{ $value }}</span>
                    @endif
                  </div>
                </div>
              @endforeach
            </div>
          </div>

          <!-- Raw JSON View -->
          <div id="rawView" class="hidden">
            <div class="json-viewer">{{ json_encode(session()->all(), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</div>
          </div>
        @else
          <div class="text-center py-12">
            <div class="w-16 h-16 bg-slate-700 rounded-full flex items-center justify-center mx-auto mb-4">
              <i class="fa-solid fa-inbox text-slate-400 text-xl"></i>
            </div>
            <h3 class="text-lg font-medium text-slate-200 mb-2">Tidak ada data session</h3>
            <p class="text-slate-400">Session kosong atau belum ada data yang disimpan.</p>
          </div>
        @endif
      </div>
    </div>


  </div>

  <script>
    // Toggle view
    function toggleView() {
      const normalView = document.getElementById('normalView');
      const rawView = document.getElementById('rawView');
      const toggleButton = document.getElementById('viewToggle');
      
      if (normalView.classList.contains('hidden')) {
        normalView.classList.remove('hidden');
        rawView.classList.add('hidden');
        toggleButton.textContent = 'Raw JSON';
      } else {
        normalView.classList.add('hidden');
        rawView.classList.remove('hidden');
        toggleButton.textContent = 'Normal View';
      }
    }

    // Copy to clipboard
    function copyValue(key) {
      const valueContainer = document.querySelector(`[data-key="${key}"]`);
      const textToCopy = valueContainer.textContent.trim();
      
      navigator.clipboard.writeText(textToCopy).then(() => {
        showNotification('Berhasil disalin!', 'success');
      }).catch(() => {
        showNotification('Gagal menyalin', 'error');
      });
    }

    // Toggle full text
    function toggleFullText(button) {
      const fullText = button.parentElement.querySelector('.full-text');
      if (fullText.classList.contains('hidden')) {
        fullText.classList.remove('hidden');
        button.textContent = 'Sembunyikan';
      } else {
        fullText.classList.add('hidden');
        button.textContent = 'Lihat selengkapnya';
      }
    }

    // Confirm clear
    function confirmClear(form) {
      if (confirm('Yakin ingin menghapus semua data session? Tindakan ini tidak dapat dibatalkan.')) {
        form.submit();
      }
    }

    // Show notification
    function showNotification(message, type = 'info') {
      const notification = document.createElement('div');
      notification.className = `fixed top-4 right-4 px-4 py-2 rounded-lg shadow-lg z-50 text-sm font-medium ${
        type === 'success' ? 'bg-green-500 text-white' : 'bg-red-500 text-white'
      }`;
      notification.textContent = message;
      
      document.body.appendChild(notification);
      
      setTimeout(() => {
        notification.style.opacity = '0';
        notification.style.transition = 'opacity 0.3s ease';
        setTimeout(() => notification.remove(), 300);
      }, 2000);
    }
  </script>

</body>
</html>