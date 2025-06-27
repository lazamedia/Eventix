<style>
    [x-cloak] { display: none !important; }
</style>

    <!-- MINI NAVBAR -->
    <nav class="hidden mx-auto md:flex items-center justify-between bg-blue-950
            h-10 w-full px-4 md:px-20 text-white transition-transform duration-300">
        <p class="text-xs">Get Your Ticket Everywhere</p>
        <div class="nav-sosmed">
            <ul class="flex space-x-4 md:space-x-8">
                <li>
                    <p href="#"
                        class="text-gray-100 text-xs font-light hover:text-blue-300 transition-colors ">
                        Faq
                    </p>
                </li>
                <li>
                    <p href="#"
                        class="text-gray-100 text-xs font-light hover:text-blue-300 transition-colors ">
                        Contact
                    </p>
                </li>
                <li>
                    <p href="#"
                        class="text-gray-100 text-xs font-light hover:text-blue-300 transition-colors ">
                        Help
                    </p>
                </li>
                <li>
                    <p href="#"
                        class="text-gray-100 text-xs font-light hover:text-blue-300 transition-colors ">
                        Komunitas
                    </p>
                </li>
            </ul>
        </div>
    </nav>

    <!-- MAIN NAVBAR -->
    <nav class="bg-blue-950 shadow-md sticky top-0 w-full z-50 transition-all duration-500" id="mainNavbar" x-data="{ mobileMenuOpen: false }">
        <div class="bg-blue-950 mx-auto px-4 lg:px-20 flex items-center justify-between gap-2 lg:gap-6 h-16">

            <!-- Logo -->
            <a href="/" aria-label="Go to Home Page" class="flex-shrink-0">
                <div class="flex items-center">
                    <span class="font-extrabold text-transparent text-xl lg:text-2xl bg-clip-text bg-gradient-to-r from-blue-600 to-blue-500">EventTix</span>
                </div>
            </a>

            <!-- Search Bar - Hidden on mobile, shown on tablet+ -->
            <div class="hidden md:flex items-center w-full max-w-md lg:max-w-none">
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input type="text" id="search"
                        class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Search" required>
                </div>
            </div>

            <!-- Desktop Navigation Items -->
            <div class="hidden lg:flex gap-3">
                <p href="" class="flex items-center text-white gap-2 text-sm  hover:text-blue-300 transition-colors">
                    <i class="fa fa-compass"></i>Explore
                </p>
                <a href="/tiket_588" class="w-max flex items-center text-white gap-2 text-sm hover:text-blue-300 transition-colors">
                    <i class="fa fa-ticket"></i> Create Ticket
                </a>
            </div>

            <!-- Desktop Auth Buttons -->
            <div class="hidden lg:flex items-center space-x-4">
                <p href="#" class="text-sm font-medium text-white border border-white rounded px-4 py-2  transition">Register</p>
                
                {{-- cek session apakah ada nim kalo ga ada tampilkan login --}}
                @if (session()->has('nim'))
                    {{-- tombol logout --}}
                    <form action="/logout" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-sm font-medium cursor-pointer text-white border border-red-500 rounded px-4 py-2 bg-red-900 hover:bg-red-800 transition">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="/login" class="text-sm font-medium text-white border border-blue-500 rounded px-4 py-2 bg-blue-900 hover:bg-blue-800 transition">
                        Login
                    </a>
                @endif

            </div>

            <!-- Mobile Menu Button -->
            <button @click="mobileMenuOpen = true" class="lg:hidden text-white p-2 hover:text-blue-300 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu Overlay -->
        <div x-show="mobileMenuOpen" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="lg:hidden fixed inset-0 z-50" 
             x-cloak>
            <div class="flex">
                <div class="flex-1  bg-opacity-50" @click="mobileMenuOpen = false"></div>
                <div x-show="mobileMenuOpen"
                     x-transition:enter="transform transition ease-in-out duration-300"
                     x-transition:enter-start="translate-x-full"
                     x-transition:enter-end="translate-x-0"
                     x-transition:leave="transform transition ease-in-out duration-300"
                     x-transition:leave-start="translate-x-0"
                     x-transition:leave-end="translate-x-full"
                     class="w-80 bg-blue-950 h-screen shadow-xl">
                    <div class="flex items-center justify-end p-4 border-b border-blue-800">
                        {{-- <span class="font-extrabold text-transparent text-xl bg-clip-text bg-gradient-to-r from-blue-600 to-blue-500">EventTix</span> --}}
                        <button @click="mobileMenuOpen = false" class="text-white p-2 hover:text-blue-300 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>

                    <div class="p-4 space-y-4">
                        <!-- Mobile Search -->
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input type="text"
                                class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Search">
                        </div>

                        <!-- Mobile Navigation Items -->
                        <div class="space-y-3 border-t border-blue-800 pt-4">
                            <p href="" class="flex items-center text-white gap-3 text-base py-2 hover:text-blue-300 transition-colors" @click="mobileMenuOpen = false">
                                <i class="fa fa-compass w-5"></i>Explore
                            </p>
                            <a href="/tiket_588" class="flex items-center text-white gap-3 text-base py-2 hover:text-blue-300 transition-colors" @click="mobileMenuOpen = false">
                                <i class="fa fa-ticket w-5"></i>Create Ticket
                            </a>
                        </div>

                        <!-- Mobile Top Menu Items -->
                        <div class="space-y-3 border-t border-blue-800 pt-4">
                            <p href="#" class="block text-white text-base py-2 hover:text-blue-300 transition-colors" @click="mobileMenuOpen = false">FAQ</p>
                            <p href="#" class="block text-white text-base py-2 hover:text-blue-300 transition-colors" @click="mobileMenuOpen = false">Contact</p>
                            <p href="#" class="block text-white text-base py-2 hover:text-blue-300 transition-colors" @click="mobileMenuOpen = false">Help</p>
                            <p href="#" class="block text-white text-base py-2 hover:text-blue-300 transition-colors" @click="mobileMenuOpen = false">Komunitas</p>
                        </div>

                        <!-- Mobile Auth Buttons -->
                        <div class="space-y-3 border-t border-blue-800 pt-4">
                            <p class="w-full text-center text-sm font-medium text-white border border-white rounded px-4 py-3   transition" @click="mobileMenuOpen = false">
                                Register
                            </p>
                            @if (session()->has('nim'))
                                {{-- logout --}}
                                <form action="/logout" method="POST" class="inline">
                                    @csrf
                                    <button type="submit"  class="w-full cursor-pointer inline-block text-center text-sm font-medium text-white border border-red-500 rounded px-4 py-3 bg-red-900 hover:bg-red-800 transition" @click="mobileMenuOpen = false">
                                        Logout
                                    </button>
                                </form>
                            @else
                                <a href="/login" class="w-full inline-block text-center text-sm font-medium text-white border border-blue-500 rounded px-4 py-3 bg-blue-900 hover:bg-blue-800 transition" @click="mobileMenuOpen = false">
                                    Login
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>