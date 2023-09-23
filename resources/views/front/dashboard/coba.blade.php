<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ App\Models\General::first()->school_name }} | @yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    @vite(['resources/css/real.css'])
    @include('front.layouts.include')
    @stack('css')
</head>
<body class="overflow-x-hidden">
    <div class="bg-gradient-to-br from-dasar via-sky-50 to-sky-200 w-full h-auto font-poppins caret-sekunder accent-primer">
        {{-- @include('front.dashboard.layouts.header') --}}
        <!-- header dashboard -->
        <header class="z-[1000] w-full bg-primer flex items-center justify-between px-7 select-none">
            <a href="{{ route('front') }}"
                class="p-2 flex gap-2 items-center group">
                <img id="logo" class="h-7 md:h-8" src="/dists/images/logo_only_white.svg">
                <span class="font-extrabold text-xl hidden sm:block text-dasar group-hover:text-sekunder">AR-ROMUSHA</span>
            </a>

            {{-- pc navigator --}}
            <nav class="hidden md:flex items-center justify-center">
                <a href="{{ route('user.dashboard') }}" 
                    class="{{ Route::is('user.coba') ? 'font-semibold' : '' }} group/nav px-4 py-5 text-dasar text-center text-sm tracking-wider relative duration-200">
                    Dashboard
                    <div class="{{ Route::is('user.coba') ? 'w-8' : 'w-0' }} duration-200 group-hover/nav:w-10 h-[.15rem] bg-sekunder rounded-full absolute bottom-4 left-1/2 right-1/2 -translate-x-1/2"></div>
                </a>
                <a href="{{ route('user.profile') }}" 
                    class="{{ Route::is('user.profile') ? 'font-semibold' : '' }} group/nav px-4 py-5 text-dasar text-center text-sm tracking-wider relative duration-200">
                    Profil
                    <div class="{{ Route::is('user.profile') ? 'w-8' : 'w-0' }} duration-200 group-hover/nav:w-10 h-[.15rem] bg-sekunder rounded-full absolute bottom-4 left-1/2 right-1/2 -translate-x-1/2"></div>
                </a>
                <a href="{{ route('user.informasi') }}" 
                    class="{{ Route::is('user.informasi.*') ? 'font-semibold' : '' }} group/nav px-4 py-5 text-dasar text-center text-sm tracking-wider relative duration-200">
                    Informasi
                    <div class="{{ Route::is('user.informasi.*') ? 'w-8' : 'w-0' }} duration-200 group-hover/nav:w-10 h-[.15rem] bg-sekunder rounded-full absolute bottom-4 left-1/2 right-1/2 -translate-x-1/2"></div>
                </a>
                <a href="{{ route('user.qna') }}" 
                    class="{{ Route::is('user.profile') ? 'font-semibold' : '' }} group/nav px-4 py-5 text-dasar text-center text-sm tracking-wider relative duration-200">
                    Q&A
                    <div class="{{ Route::is('user.profile') ? 'w-8' : 'w-0' }} duration-200 group-hover/nav:w-10 h-[.15rem] bg-sekunder rounded-full absolute bottom-4 left-1/2 right-1/2 -translate-x-1/2"></div>
                </a>

                <span class="px-2 py-1 ms-3 text-dasar text-center text-xl duration-200 hover:bg-sekunder rounded-full border border-sekunder group/account relative">
                    <i class="bi bi-person"></i>
                    <div class="hidden group-hover/account:block duration-200 absolute pt-4 top-8 right-0 min-w-52 w-52">
                        <div class="w-full bg-dasar shadow-lg rounded-xl grid grid-cols-1 divide-y border border-sekunder">
                            <span class="select-none w-full block text-sm p-3 text-primer font-semibold">{{ $user->name }}</span>
                            <a href="{{ route('user.logout') }}" class="w-full text-sm p-3 text-primer font-semibold hover:text-emerald-500 duration-200 flex items-center justify-center">
                                <i class="bi bi-box-arrow-left text-emerald-600 text-lg me-2"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </div>
                </span>
            </nav>
            
            {{-- mobile navigator --}}
            <nav class="block md:hidden z-[1000]">
                <span class="text-dasar" id="menuBar" onclick="myMenu(this)">
                    <div class="group/menubar hover:bg-emerald-500 rounded-full flex flex-col items-center justify-center gap-y-1 p-1 py-1.5 cursor-pointer">
                        <div 
                            class="w-5 h-0.5 bg-dasar duration-200 group-hover/menubar:rotate-45 group-hover/menubar:translate-y-1.5"
                        ></div>
                        <div 
                            class="w-5 h-0.5 bg-dasar duration-200 group-hover/menubar:opacity-0"
                        ></div>
                        <div 
                            class="w-5 h-0.5 bg-dasar duration-200 group-hover/menubar:-rotate-45 group-hover/menubar:-translate-y-1.5"
                        ></div>
                    </div>
                </span>

                <span id="navMenuMobile" class="w-0 duration-200 absolute top-[2.75rem] right-0 h-screen bg-sky-950 grid grid-cols-1 divide-y-2">
                    <div class="flex flex-col">
                            <a href="" 
                            class="{{ Route::is('user.coba') ? 'font-semibold text-xl' : '' }} group/nav w-full px-7 py-4 text-dasar text-start tracking-wider relative duration-200 hover:bg-sky-900">
                            Dashboard
                        </a>
                        <a href="" 
                        class="{{ Route::is('user.profile') ? 'font-semibold text-xl' : '' }} group/nav w-full px-7 py-4 text-dasar text-start tracking-wider relative duration-200 hover:bg-sky-900">
                        Profil
                        </a>
                        <a href="" 
                            class="{{ Route::is('user.informasi.*') ? 'font-semibold text-xl' : '' }} group/nav w-full px-7 py-4 text-dasar text-start tracking-wider relative duration-200 hover:bg-sky-900">
                            Informasi
                        </a>
                        <a href="" 
                            class="{{ Route::is('user.profile') ? 'font-semibold text-xl' : '' }} group/nav w-full px-7 py-4 text-dasar text-start tracking-wider relative duration-200 hover:bg-sky-900">
                            Q&A
                        </a>
                    </div>
                    <div class="flex flex-col w-full border-t-sky-700">
                        <span class="px-7 py-3 text-sky-400 select-none">{{ $user->name }}</span>
                        <a href="{{ route('user.logout') }}" class="w-full px-7 py-0 text-sm text-sky-400 font-semibold hover:text-sky-200 duration-200 flex items-center justify-start">
                            <i class="bi bi-box-arrow-left text-sky-300 text-lg me-2"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </span>

                <script>
                    function myMenu(event) {
                        const div1 = document.querySelector('span#menuBar > div > div:nth-child(1)');
                        const div2 = document.querySelector('span#menuBar > div > div:nth-child(2)');
                        const div3 = document.querySelector('span#menuBar > div > div:nth-child(3)');

                        // Tambahkan atau hapus class untuk animasi rotasi dan translasi
                        div1.classList.toggle('rotate-45');
                        div1.classList.toggle('translate-y-1.5');
                        div2.classList.toggle('opacity-0');
                        div3.classList.toggle('-rotate-45');
                        div3.classList.toggle('-translate-y-1.5');

                        // menu mobile
                        const menuMobile = document.querySelector('#navMenuMobile');

                        menuMobile.classList.toggle('w-0');
                        menuMobile.classList.toggle('w-1/2');
                    }
                </script>
            </nav>
        </header>

        <div class="bg-gradient-to-br from-dasar via-sky-50 to-sky-100 w-full h-screen font-poppins caret-sekunder accent-primer">
            
            {{-- alur --}}
            <section id="alur" class="w-full py-16 select-none">
                <div class="mx-auto container">
                    <div class="w-11/12 lg:w-1/2 mx-auto">
                        <div class="flex items-center justify-between bg-gray-200 h-1.5 relative">
                            <div class="absolute w-full">
                                <div class="overflow-hidden h-1.5 flex rounded bg-gray-200">
                                    <div style="
                                        width:75%
                                        /* @if ($user->payment == 'Sudah')
                                        width:75%
                                        @elseif ($user->status == 'Sedang')
                                        width:25%
                                        @else
                                        width:50%
                                        @endif */
                                        " 
                                        class="shadow-none flex flex-col justify-center bg-sekunder"
                                    ></div>
                                </div>
                            </div>
                            @php
                                $sudah   = 'rounded-full w-6 h-6 bg-sekunder shadow-md text-center';
                                
                                $sedang  = 'rounded-full w-6 h-6 bg-sekunder shadow-md ring-[3px] ring-offset-[3px] ring-sekunder text-center';

                                $belum    = 'rounded-full w-6 h-6 bg-dasar shadow-md text-center';
                            @endphp
                            <div class="relative">
                                <div class="rounded-full w-6 h-6 bg-sekunder shadow-md text-center">
                                    <i class="bi bi-check-lg text-white"></i>
                                </div>
                                <p class="absolute text-center left-1/2 -translate-x-1/2 top-10 text-sekunder w-32 rounded-md bg-dasar shadow-lg text-xs tracking-wide leading-4 py-1 p-2">
                                    <span class="font-bold">Step 1 :</span><br>Mendaftar & Login
                                </p>
                            </div>
                            {{-- contoh --}}
                            {{-- <div class="relative">
                                <div 
                                    class="
                                    @if ($user->status == 'Sudah') {{ $sudah }} 
                                    @elseif ($user->status == 'Sedang') {{ $sedang }} 
                                    @else {{ $belum }} @endif">
                                    <i class="bi bi-check-lg text-white"></i>
                                </div>
                                <p class="absolute text-center left-1/2 -translate-x-1/2 top-10 text-sekunder w-32 rounded-md bg-dasar shadow-lg text-xs tracking-wide leading-4 py-1 p-2">
                                    <span class="font-bold">Contoh :</span><br>Ini Cuma Contoh
                                </p>
                            </div> --}}
                            {{-- end contoh --}}
                            <div class="relative">
                                <div class="rounded-full w-6 h-6 bg-sekunder shadow-md text-center">
                                    <i class="bi bi-check-lg text-white"></i>
                                </div>
                                <p class="absolute text-center left-1/2 -translate-x-1/2 top-10 text-sekunder w-32 rounded-md bg-dasar shadow-lg text-xs tracking-wide leading-4 py-1 p-2">
                                    <span class="font-bold">Step 2 :</span><br>Membayar Registrasi
                                </p>
                            </div>
                            <div class="relative">
                                <div class="rounded-full w-6 h-6 bg-sekunder shadow-md text-center">
                                    <i class="bi bi-check-lg text-white"></i>
                                </div>
                                <p class="absolute text-center left-1/2 -translate-x-1/2 top-10 text-sekunder w-32 rounded-md bg-dasar shadow-lg text-xs tracking-wide leading-4 py-1 p-2">
                                    <span class="font-bold">Step 3 :</span><br>Mengisi Form & Upload dokumen
                                </p>
                            </div>
                            <div class="relative">
                                <div class="rounded-full w-6 h-6 bg-sekunder shadow-md ring-[3px] ring-offset-[3px] ring-sekunder text-center">
                                    {{-- <i class="bi bi-check-lg text-white"></i> --}}
                                </div>
                                <p class="absolute text-center left-1/2 -translate-x-1/2 top-10 text-sekunder w-32 rounded-md bg-dasar shadow-lg text-xs tracking-wide leading-4 py-1 p-2">
                                    <span class="font-bold">Step 4 :</span><br>Tunggu Pengumuman
                                </p>
                            </div>
                            <div class="relative">
                                <div class="rounded-full w-6 h-6 bg-dasar shadow-md text-center">
                                    <i class="bi bi-check-lg text-white"></i>
                                </div>
                                <p class="absolute text-center left-1/2 -translate-x-1/2 top-10 text-sekunder w-32 rounded-md bg-dasar shadow-lg text-xs tracking-wide leading-4 py-1 p-2">
                                    <span class="font-bold">Step 5 :</span><br>Membayar Biaya Pangkal
                                </p>
                                {{-- <p class="absolute text-center left-1/2 -translate-x-1/2 -top-12 text-sekunder w-32 rounded-full bg-dasar shadow-lg text-xs tracking-wide leading-4 py-1 p-2 border border-sekunder">
                                    <span class="font-bold text-sm">Selamat!!</span>
                                </p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- kotak bantuan --}}
            <section class="py-16 px-5 md:px-10 lg:px-20">
                <div class="bg-sky-900 p-10 w-full text-dasar flex justify-center items-center flex-col text-center gap-y-3 rounded-xl">
                    <p class="text-lg">Untuk informasi lebih lanjut, silahkan hubungi kami melalui link dibawah ini.</p>
                    <a href="https://api.whatsapp.com/send?phone={{ App\Models\General::first()->school_phone }}&text=Assalamu%20Alaikum%20Admin." target="_blank" 
                    class="bg-sekunder py-2 px-7 font-bold uppercase tracking-wider rounded-full shadow-lg hover:bg-sekunder/50 duration-200"
                    >Hubungi kami</a>
                </div>
            </section>
        </div>
        {{-- @include('front.layouts.footer') --}}
        @include('front.dashboard.layouts.script')
        @stack('my-script')
    </div>
</body>
</html>