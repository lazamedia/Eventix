<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('ataskelompok3')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        @endif

        {{-- CDN Font Awesome --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
            integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
       
        {{-- CDN AlpineJS --}}
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        

    </head>
    <body>

        @include('layouts.navbarkelompok3')

        <div class="font-sans text-gray-900 antialiased">

            @yield('tengahkelompok3')
        
        </div>

        <footer class="bg-white border-t border-gray-200">
            <div class="max-w-6xl mx-auto px-4 py-6">
                <div class="flex flex-col md:flex-row items-center justify-between space-y-4 md:space-y-0">

                    <!-- Yield Bawah -->
                    <div class="text-sm text-gray-600">

                        @yield('bawahkelompok3')
                        
                    </div>

                    <div class="flex items-center space-x-6 text-sm text-gray-600">
                        <p href="#" class="hover:text-gray-900 transition-colors">Privacy</p>
                        <p href="#" class="hover:text-gray-900 transition-colors">Terms</p>
                        <a href="/session" target="_blank" class="hover:text-gray-900 transition-colors flex gap-1 items-center">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Cek Session</a>
                    </div>
                </div>
            </div>
        </footer>

    </body>
</html>
