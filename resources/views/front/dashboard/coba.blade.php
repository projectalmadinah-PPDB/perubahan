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
        <!-- header dashboard -->
        <header 
            class="z-[1000] w-full bg-primer flex items-center justify-between px-7 select-none">
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
                            <span class="select-none w-full block text-sm p-3 text-primer capitalize font-semibold">{{$user->name}}</span>
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
                        <span class="px-7 py-3 text-sky-400 select-none capitalize">{{$user->name}}</span>
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

        <div 
            class="bg-gradient-to-br from-dasar via-sky-50 to-sky-100 w-full min-h-screen font-poppins caret-sekunder accent-primer">

            {{-- alert --}}
            @if (session('pribadi'))
                <section id="alertProfile" class="w-full py-2 px-10 lg:px-64 flex flex-col justify-center items-center bg-berhasil text-dasar">
                    <div class="flex justify-between items-center w-full">
                        <p class="">{{session('pribadi')}}</p>
                        <span role="button" id="closeAlert" onclick="document.getElementById('alertProfile').classList.add('hidden')" 
                            class="px-1.5 rounded-full border border-dasar hover:bg-dasar text-dasar hover:text-primer duration-200">
                            &#10006;
                        </span>
                    </div>
                </section>
            @elseif (session('lengkap'))
                <section id="alertProfile" class="w-full py-2 px-10 lg:px-64 flex flex-col justify-center items-center bg-berhasil text-dasar">
                    <div class="flex justify-between items-center w-full">
                        <p class="">{{session('lengkap')}}</p>
                        <span role="button" id="closeAlert" onclick="document.getElementById('alertProfile').classList.add('hidden')" 
                            class="px-1.5 rounded-full border border-dasar hover:bg-dasar text-dasar hover:text-primer duration-200">
                            &#10006;
                        </span>
                    </div>
                </section>
            @endif

            <!-- pesan status -->
            <section class="w-full py-7 px-10 lg:px-60 bg-transparent flex flex-col justify-center items-center gap-4">
                <div class="flex flex-col gap-3 justify-center items-center w-full py-7 md:py-10 px-7 md:px-12 bg-sky-900 text-dasar rounded-xl shadow-xl border-2 border-primer">
                    @php
                        $buttonStep = 'text-sm md:text-md py-2 px-7 rounded-full bg-sekunder hover:bg-sekunder/50 hover:font-semibold duration-200 text-dasar shadow-md hover:shadow-xl';
                    @endphp
                    @if (!$user->payment)
                        <h1 class="text-2xl md:text-3xl tracking-wide font-semibold text-center">
                            Selamat Datang <span class="capitalize title">{{$user->name}}</span>!
                        </h1>
                        <p class="tracking-wide text-sm md:text-lg text-center">
                            Silahkan melakukan Pembayaran Administrasi melalui tombol dibawah ini
                        </p>
                        <a href="{{route('user.pay', $user->id)}}" class="{{ $buttonStep }}">
                            Tekan Disini
                        </a>
                    @else
                        @if ($user->payment->status == 'pending')
                            <h1 class="text-2xl md:text-3xl tracking-wide font-semibold text-center">
                                Pembayaran <span class="capitalize title">{{$user->name}}</span> sedang dalam proses!
                            </h1>
                            <p class="tracking-wide text-sm md:text-lg text-center">
                                Lengkapi proses pembayaran anda melalui tombol dibawah ini
                            </p>
                            <a href="{{$user->payment->link}}" 
                                class="{{ $buttonStep }}">
                                Lanjutkan Proses
                            </a>
                        @elseif ($user->payment->status == 'expired')
                            <h1 class="text-2xl md:text-3xl tracking-wider font-semibold text-center">
                                Halo <span class="capitalize title">{{$user->name}}</span>, Sepertinya Kamu Tidak Melakukan Pembayaran Lebih Dari 24 Jam!
                            </h1>
                            <p class="tracking-wide text-sm md:text-lg text-center">
                                Untuk melakukan pembayaran ulang, tekan tombol dibawah ini
                            </p>
                            <a href="{{route('user.pay',$user->id)}}" 
                                class="{{ $buttonStep }}">
                                Bayar Ulang
                            </a>
                        @elseif ($user->payment->status == 'berhasil')
                            @if (!$user->student && !$user->parents)
                                <h1 class="text-2xl md:text-3xl tracking-wide font-semibold text-center">
                                    Selamat <span class="capitalize title">{{$user->name}}</span>, Anda telah menyelesaikan proses pembayaran administrasi!
                                </h1>
                                <p class="tracking-wide text-sm md:text-lg text-center">
                                    {{-- Tekan tombol dibawah ini untuk melengkapi data diri anda --}}
                                    Lengkapi data diri anda melalui tombol dibawah ini.
                                </p>
                                <a href="{{route('user.kelengkapan')}}" 
                                class="{{ $buttonStep }}">
                                    Lengkapi Data Diri
                                </a>
                            @elseif (!$user->document)
                                <h1 class="text-2xl md:text-3xl tracking-wider font-semibold text-center">
                                    Hai <span class="capitalize title">{{$user->name}}</span>, Data diri anda sudah lengkap!
                                </h1>
                                <p class="tracking-wide text-sm md:text-lg text-center">
                                    Silahkan upload dokumen persyaratan melalui tombol dibawah ini
                                </p>
                                <a href="{{route('user.document')}}" 
                                    class="{{ $buttonStep }}">
                                    Upload Dokumen
                                </a>
                            @elseif ($user->student && $user->parents && $user->document)
                                @if ($user->status == 'Lulus')
                                    <h1 class="text-2xl md:text-3xl tracking-[0.02rem] font-semibold text-center">
                                        Selamat <span class="capitalize title">{{$user->name}}</span>, telah menjadi siswa baru!
                                    </h1>
                                    <p class="tracking-wide text-sm md:text-lg text-center">
                                        Selamat datang di Sekolah {{ App\Models\General::first()->school_name }}!
                                    </p>
                                    <a href="{{route('front')}}" class="{{ $buttonStep }}">
                                        Home
                                    </a>
                                @elseif ($user->status == 'Wawancara')
                                    <h1 class="text-2xl md:text-3xl tracking-[0.02rem] font-semibold text-center">
                                        Anda telah melakukan wawancara!
                                    </h1>
                                    <p class="tracking-wide text-sm md:text-lg text-center">
                                        Nantikan pengumuman kelulusan anda!
                                    </p>
                                    <a href="{{route('front')}}" class="{{ $buttonStep }}">
                                        Home
                                    </a>
                                @elseif ($user->status == 'Gagal')
                                    <h1 class="text-2xl md:text-3xl tracking-[0.02rem] font-semibold text-center">
                                        Maaf <span class="capitalize title">{{ $user->name }}</span>, Anda dinyatakan gagal!
                                    </h1>
                                    <p class="tracking-wide text-sm md:text-lg text-center">
                                        Semangat! Kesempatan berikutnya pasti berhasil anda lalui.
                                    </p>
                                    <a href="{{route('front')}}" class="{{ $buttonStep }}">
                                        Home
                                    </a>
                                @else
                                    <h1 class="text-2xl md:text-3xl tracking-[0.02rem] font-semibold text-center">
                                        Selamat <span class="capitalize title">{{$user->name}}</span>, Semua data yang diperlukan sudah lengkap!
                                    </h1>
                                    <p class="tracking-wide text-sm md:text-lg text-center">
                                        Terima kasih telah menyelesaikan pendaftaran! Tunggu pesan selanjutnya dari Admin
                                    </p>
                                    <a href="{{route('user.profile')}}" class="{{ $buttonStep }}">
                                        Cek Profil
                                    </a>
                                @endif
                            @endif
                        @endif
                    @endif
                </div>
            </section>
        
            {{-- alur --}}
            <section id="alur" class="w-full py-16 select-none">
                <div class="mx-auto container">
                    <div class="w-11/12 lg:w-1/2 mx-auto">
                        <div class="flex items-center justify-between bg-gray-200 h-1.5 relative">
                            <div class="absolute w-full">
                                <div class="overflow-hidden h-1.5 flex rounded bg-gray-200">
                                    <div style="
                                        @if (!$user->payment)
                                        width: 0%;
                                        @else
                                            @if ($user->payment->status == 'pending')
                                            width: 25%;
                                            @elseif ($user->payment->status == 'expired')
                                            width: 25%;
                                            @elseif ($user->payment->status == 'berhasil')
                                                @if (!$user->student || !$user->document)
                                                width: 50%;
                                                @elseif ($user->document && $user->status == 'Belum')
                                                width: 75%;
                                                @else
                                                width: 100%;
                                                @endif
                                            @endif
                                        @endif
                                        " 
                                        class="shadow-none flex flex-col justify-center bg-sekunder"
                                    ></div>
                                </div>
                            </div>
                            @php
                                $sudah    = 'rounded-full w-6 h-6 bg-sekunder shadow-md text-center';
                                
                                $sedang   = 'rounded-full w-6 h-6 bg-sekunder shadow-md ring-[3px] ring-offset-[4px] ring-sekunder text-center';
        
                                $belum    = 'rounded-full w-6 h-6 bg-dasar shadow-md text-center';

                                $error    = 'rounded-full w-6 h-6 bg-larangan shadow-md ring-[3px] ring-offset-[4px] ring-larangan text-center'
                            @endphp
                            <div class="relative">
                                <div class="@if (!$user->payment) {{ $sedang }} @else {{ $sudah }} @endif">
                                    <i class="bi bi-check-lg text-white"></i>
                                </div>
                                <p class="absolute text-center left-1/2 -translate-x-1/2 top-10 text-sekunder w-32 rounded-md bg-dasar shadow-lg text-xs tracking-wide leading-4 py-1 p-2">
                                    <span class="font-bold">Step 1 :</span><br>Mendaftar & Login
                                </p>
                            </div>
                            <div class="relative">
                                <div class="
                                    @if ($user->payment)
                                        @if ($user->payment->status == 'pending') {{ $sedang }} 
                                        @elseif ($user->payment->status == 'expired') {{ $error }} 
                                        @elseif ($user->payment->status == 'berhasil') {{ $sudah }} @endif
                                    @else {{ $belum }} @endif
                                    ">
                                    @if ($user->payment && $user->payment->status == 'berhasil')
                                        <i class="bi bi-check-lg text-white"></i>
                                    @endif
                                </div>
                                @if ($user->payment && ($user->payment->status == 'expired' || $user->payment->status == 'pending'))
                                <p class="absolute text-center left-1/2 -translate-x-1/2 -top-12 bg-sekunder w-32 rounded-full text-dasar shadow-lg text-xs tracking-wide leading-4 py-1 p-2 border border-sekunder ring-2 ring-offset-2 ring-sekunder">
                                    <span class="font-medium text-sm">Kamu Disini!!</span>
                                </p>
                                @endif
                                <p class="absolute text-center left-1/2 -translate-x-1/2 top-10 text-sekunder w-32 rounded-md bg-dasar shadow-lg text-xs tracking-wide leading-4 py-1 p-2">
                                    <span class="font-bold">Step 2 :</span><br>Membayar Registrasi
                                </p>
                            </div>
                            <div class="relative">
                                <div class="
                                    @if ($user->payment && $user->payment->status == 'berhasil')
                                        @if (!$user->student && !$user->parents) {{ $sedang }}
                                        @else {{ $sudah }} @endif
                                    @else {{ $belum }} @endif
                                    
                                    @if (!$user->document && !$user->student) {{ $belum }}
                                    @elseif (!$user->document && $user->student) {{ $sedang }}
                                    @else {{ $sudah }} @endif
                                    ">
                                    @if ($user->student && $user->parents && $user->document)
                                        <i class="bi bi-check-lg text-white"></i>
                                    @endif
                                </div>
                                @if ($user->payment && !$user->student)
                                <p class="absolute text-center left-1/2 -translate-x-1/2 -top-12 bg-sekunder w-32 rounded-full text-dasar shadow-lg text-xs tracking-wide leading-4 py-1 p-2 border border-sekunder ring-2 ring-offset-2 ring-sekunder">
                                    <span class="font-medium text-sm">Kamu Disini!!</span>
                                </p>
                                @endif
                                <p class="absolute text-center left-1/2 -translate-x-1/2 top-10 text-sekunder w-32 rounded-md bg-dasar shadow-lg text-xs tracking-wide leading-4 py-1 p-2">
                                    <span class="font-bold">Step 3 :</span><br>Mengisi Form & Upload Dokumen
                                </p>
                            </div>
                            <div class="relative">
                                <div class="
                                    @if ($user->document && $user->status == 'Belum') {{ $sedang }}
                                    @elseif ($user->status == 'Gagal' || $user->status == 'Lulus') {{ $sudah }}
                                    @else {{ $belum }}
                                    @endif
                                    ">
                                    @if ($user->document && $user->status !== 'Belum')
                                        <i class="bi bi-check-lg text-white"></i>
                                    @endif
                                </div>
                                @if ($user->document && $user->status == 'Belum')
                                <p class="absolute text-center left-1/2 -translate-x-1/2 -top-12 bg-sekunder w-36 rounded-full text-dasar shadow-lg text-xs tracking-wide leading-4 py-1 p-2 border border-sekunder ring-2 ring-offset-2 ring-sekunder">
                                    <span class="font-medium text-sm">Tunggu arahan!!</span>
                                </p>
                                @endif
                                <p class="absolute text-center left-1/2 -translate-x-1/2 top-10 text-sekunder w-32 rounded-md bg-dasar shadow-lg text-xs tracking-wide leading-4 py-1 p-2">
                                    <span class="font-bold">Step 4 :</span><br>Melakukan Wawancara 
                                </p>
                            </div>
                            <div class="relative">
                                <div class="
                                    @if ($user->status !== 'Belum') {{ $sedang }}
                                    @elseif ($user->status == 'Gagal') {{ $error }}
                                    @else {{ $belum }}  @endif">
                                    @if ($user->status == 'Lulus')
                                        <i class="bi bi-check-lg text-white"></i>
                                    @endif
                                </div>
                                <p class="absolute text-center left-1/2 -translate-x-1/2 top-10 text-sekunder w-32 rounded-md bg-dasar shadow-lg text-xs tracking-wide leading-4 py-1 p-2">
                                    <span class="font-bold">Step 5 :</span><br>Menunggu Pengumuman
                                </p>
                                @if ($user->status == 'Gagal' || $user->status == 'Lulus')
                                    <p class="absolute text-center left-1/2 -translate-x-1/2 -top-12 bg-sekunder w-32 rounded-full text-dasar shadow-lg text-xs tracking-wide leading-4 py-1 p-2 border border-sekunder ring-2 ring-offset-2 ring-sekunder">
                                        <span class="font-medium text-sm">
                                            @if ($user->status == 'Lulus')
                                            Selamat!!
                                            @else
                                            Kamu Disini!!
                                            @endif
                                        </span>
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- pengumuman --}}
            <section class="pt-16 pb-10 px-5 md:px-10 lg:px-20 flex flex-col justify-start items-center">
                <h1 class="mt-2 text-3xl mb-8 font-bold title">Informasi Singkat.</h1>
                <div class="flex justify-center items-start flex-wrap gap-4 w-full px-10 sm:px-18 md:px-32">
            @if (!$user->payment || ($user->payment && $user->payment->status !== 'berhasil'))
                <div title="proses pembayaran" class="py-7 px-6 border border-sekunder rounded-xl flex flex-col justify-center gap-y-1 items-center min-w-min w-full text-center min-h-[10rem]">
                    <h1 class="leading-5 text-center text-lg font-semibold tracking-wide mb-4">
                        Melakukan Proses Pembayaran
                    </h1>
                    <ul class="w-full tracking-wide leading-relaxed list-decimal text-start ps-5">
                        <li>
                            Pastikan Anda memiliki akun virtual,
                        </li>
                        <li>
                            siapkan uang sebesar 100.000 Rupiah,
                        </li>
                        <li>
                            dan lakukan pembayaran secara teratur.
                        </li>
                        <li>
                            Anda dapat mengikuti tutorial pembayaran menggunakan 
                            <a href="https://ipaymu.com/" target="_blank" class="font-semibold italic hover:underline hover:text-sky-800 text-sky-600 duration-200"
                            >iPaymu</a>
                            melalui 
                            <a href="" class="font-medium italic hover:underline hover:text-sky-800 text-sky-600 duration-200"
                            >link ini</a>.
                        </li>
                        <li>
                            Atau dapat menghubungi kami melalui link ini. <a target="_blank" class="italic hover:text-sky-800 text-sky-600" href="https://api.whatsapp.com/send?phone={{ App\Models\General::first()->school_phone }}&text=Assalamu%20Alaikum%20Admin.">Hubungi Kami.</a>
                        </li>
                    </ul>
                </div>
            @else
                @if (!$user->student && !$user->parents)
                    <div title="mengisi form data diri" class="py-7 px-6 border border-sekunder rounded-xl flex flex-col justify-center gap-y-1 items-center min-w-min w-full text-center min-h-[10rem]">
                        <h1 class="leading-5 text-center text-lg font-semibold tracking-wide mb-4">
                            Mengisi Formulir Data Diri
                        </h1>
                        <p class="w-full tracking-wide leading-relaxed">
                            Langkah berikutnya adalah mengisi formulir pendaftaran dengan benar dan teliti.
                        </p>
                        <p class="w-full tracking-wide leading-relaxed">
                            Pastikan semua informasi yang Anda berikan akurat sesuai fakta.
                        </p>
                    </div>
                @elseif ($user->student && !$user->document)
                    <div title="mengupload dokumen" class="py-7 px-6 border border-sekunder rounded-xl flex flex-col justify-center gap-y-1 items-center min-w-min w-full text-center min-h-[10rem]">
                        <h1 class="leading-5 text-center text-lg font-semibold tracking-wide mb-4">
                            Mengupload Dokumen Persyaratan
                        </h1>
                        <p class="w-full tracking-wide leading-relaxed">
                            Sebelum melanjutkan, pastikan menyiapkan dokumen persyaratan yang dibutuhkan, yaitu :
                            <ul class="list-disc text-start">
                                <li>Kartu Keluarga <i>(scan pdf)</i></li>
                                <li>Akte Kelahiran <i>(scan pdf)</i></li>
                                <li>Ijazah Sekolah Terakhir <i>(scan pdf)</i></li>
                                <li>Rapor Terakhir <i>(scan pdf)</i></li>
                            </ul>
                            Kemudian upload dokumen tersebut sesuai pada form yang tersedia.
                        </p>
                    </div>
                @elseif ($user->document)
                    @if ($user->status == 'Belum')
                        <div title="menunggu arahan" class="py-7 px-6 border border-sekunder rounded-xl flex flex-col justify-center gap-y-1 items-center min-w-min w-full text-center min-h-[10rem]">
                            <h1 class="leading-5 text-center text-lg font-semibold tracking-wide mb-4">
                                Tunggu Instruksi Lebih Lanjut dari Admin
                            </h1>
                            <p class="w-full tracking-wide leading-relaxed">
                                Setelah mengisi formulir dan mengunggah dokumen, tunggu instruksi selanjutnya dari admin.
                            </p>
                            <p class="w-full tracking-wide leading-relaxed">
                                Admin akan memberikan informasi lebih lanjut mengenai proses selanjutnya.
                            </p>
                        </div>
                    @elseif ($user->status == 'Wawancara')
                        <div title="menunggu hasil wawancara" class="py-7 px-6 border border-sekunder rounded-xl flex flex-col justify-center gap-y-1 items-center min-w-min w-full text-center min-h-[10rem]">
                            <h1 class="leading-5 text-center text-lg font-semibold tracking-wide mb-4">
                                Tunggu Pengumuman Hasil Wawancara
                            </h1>
                            <p class="w-full tracking-wide leading-relaxed">
                                Setelah proses wawancara, tunggu pengumuman hasilnya.
                            </p>
                            <p class="w-full tracking-wide leading-relaxed">
                                Admin akan memberikan informasi mengenai kelulusan Anda.
                            </p>
                        </div>
                    @elseif ($user->status == 'Lulus')
                        <div title="proses pendaftaran selesai" class="py-7 px-6 border border-sekunder rounded-xl flex flex-col justify-center gap-y-1 items-center min-w-min w-full text-center min-h-[10rem]">
                            <h1 class="leading-5 text-center text-lg font-semibold tracking-wide mb-4">
                                Proses Pendaftaran Selesai
                            </h1>
                            <p class="w-full tracking-wide leading-relaxed">
                                Selamat! Proses pendaftaran Anda telah selesai. Anda sekarang berhak untuk memulai tahun ajaran baru di sekolah <b class="text-sky-800">{{ App\Models\General::first()->school_name }}</b> ini.
                            </p>
                        </div>
                        <div title="lihat informasi masuk sekolah" class="py-7 px-6 border border-sekunder rounded-xl flex flex-col justify-center gap-y-1 items-center min-w-min w-full text-center min-h-[10rem]">
                            <h1 class="leading-5 text-center text-lg font-semibold tracking-wide mb-4">
                                Lihat Informasi Masuk Sekolah
                            </h1>
                            <p class="w-full tracking-wide leading-relaxed">
                                Jika Anda dinyatakan lulus, lihat informasi mengenai masuk sekolah.
                            </p>
                            <p class="w-full tracking-wide leading-relaxed">
                                Pastikan Anda membawa fotokopi dokumen persyaratan saat mendaftar.
                            </p>
                        </div>
                    @elseif ($user->status == 'Gagal')
                        <div title="proses pendaftaran selesai" class="py-7 px-6 border border-sekunder rounded-xl flex flex-col justify-center gap-y-1 items-center min-w-min w-full text-center min-h-[10rem]">
                            <h1 class="leading-5 text-center text-lg font-semibold tracking-wide mb-4">
                                Proses Pendaftaran Selesai
                            </h1>
                            <p class="w-full tracking-wide leading-relaxed">
                                Yaah.. Sayang sekali kamu gagal menjadi siswa baru di sekolah <a href="{{ route('front') }}" class="text-sky-800 font-bold">{{ App\Models\General::first()->school_name }}</a> ini.
                            </p>
                            <p class="w-full tracking-wide leading-relaxed">
                                Tetap Semangatt!! Kesempatan lain pasti akan menjadi titik balik hidup anda.
                                <br><br>
                                <blockquote class="tracking-wider font-bold italic relative">
                                    <div id="before" class="w-1 rounded-full h-7 bg-sky-700 absolute -left-10 top-1/2 -translate-y-1/2"></div>
                                    "Keep going. Everything you need will come to you at the perfect time."
                                </blockquote>
                                <br>
                                Terus maju. Apapun yang kamu butuhkan akan datang padamu di waktu yang tepat
                            </p>
                        </div>
                        
                        <div title="lihat informasi masuk sekolah" class="py-7 px-6 border border-sekunder rounded-xl flex flex-col justify-center gap-y-1 items-center min-w-min w-full text-center min-h-[10rem]">
                            <h1 class="leading-5 text-center text-lg font-semibold tracking-wide mb-4">
                                Lihat Informasi Masuk Sekolah
                            </h1>
                            <p class="w-full tracking-wide leading-relaxed">
                                Jika Anda dinyatakan lulus, lihat informasi mengenai masuk sekolah.
                            </p>
                            <p class="w-full tracking-wide leading-relaxed">
                                Pastikan Anda membawa fotokopi dokumen persyaratan saat mendaftar.
                            </p>
                        </div>
                    @endif
                @endif
            @endif
                </div>
            </section>

            
            {{-- pengumuman --}}
            {{-- <section class="pt-16 pb-10 px-5 md:px-10 lg:px-20 flex flex-col justify-start items-center">
                <h1 class="mt-2 text-3xl mb-8 font-bold title">Informasi Singkat.</h1>
                <div class="flex justify-center items-start flex-wrap gap-4 w-full px-10 sm:px-18 md:px-32">
                    
                    <div title="proses pembayaran" class="py-7 px-6 border border-sekunder rounded-xl flex flex-col justify-center gap-y-1 items-center min-w-min w-full text-center min-h-[10rem]">
                        <h1 class="leading-5 text-center text-lg font-semibold tracking-wide mb-4">
                            Melakukan Proses Pembayaran
                        </h1>
                        <ul class="w-full tracking-wide leading-relaxed list-decimal text-start ps-5">
                            <li>
                                Pastikan Anda memiliki akun virtual,
                            </li>
                            <li>
                                siapkan uang sebesar 100.000 Rupiah,
                            </li>
                            <li>
                                dan lakukan pembayaran secara teratur.
                            </li>
                            <li>
                                Anda dapat mengikuti tutorial pembayaran menggunakan 
                                <a href="https://ipaymu.com/" target="_blank" class="font-semibold italic hover:underline hover:text-sky-800 text-sky-600 duration-200"
                                >iPaymu</a>
                                melalui 
                                <a href="" class="font-medium italic hover:underline hover:text-sky-800 text-sky-600 duration-200"
                                >link ini</a>.
                            </li>
                            <li>
                                Atau dapat menghubungi kami melalui link ini. <a target="_blank" class="italic hover:text-sky-800 text-sky-600" href="https://api.whatsapp.com/send?phone={{ App\Models\General::first()->school_phone }}&text=Assalamu%20Alaikum%20Admin.">Hubungi Kami.</a>
                            </li>
                        </ul>
                    </div>

                    <div title="mengisi form data diri" class="py-7 px-6 border border-sekunder rounded-xl flex flex-col justify-center gap-y-1 items-center min-w-min w-full text-center min-h-[10rem]">
                        <h1 class="leading-5 text-center text-lg font-semibold tracking-wide mb-4">
                            Mengisi Formulir Data Diri
                        </h1>
                        <p class="w-full tracking-wide leading-relaxed">
                            Langkah berikutnya adalah mengisi formulir pendaftaran dengan benar dan teliti.
                        </p>
                        <p class="w-full tracking-wide leading-relaxed">
                            Pastikan semua informasi yang Anda berikan akurat sesuai fakta.
                        </p>
                    </div>

                    <div title="mengupload dokumen" class="py-7 px-6 border border-sekunder rounded-xl flex flex-col justify-center gap-y-1 items-center min-w-min w-full text-center min-h-[10rem]">
                        <h1 class="leading-5 text-center text-lg font-semibold tracking-wide mb-4">
                            Mengupload Dokumen Persyaratan
                        </h1>
                        <p class="w-full tracking-wide leading-relaxed">
                            Sebelum melanjutkan, pastikan menyiapkan dokumen persyaratan yang dibutuhkan, yaitu :
                            <ul class="list-disc text-start">
                                <li>Kartu Keluarga <i>(scan pdf)</i></li>
                                <li>Akte Kelahiran <i>(scan pdf)</i></li>
                                <li>Ijazah Sekolah Terakhir <i>(scan pdf)</i></li>
                                <li>Rapor Terakhir <i>(scan pdf)</i></li>
                            </ul>
                            Kemudian upload dokumen tersebut sesuai pada form yang tersedia.
                        </p>
                    </div>

                    <div title="menunggu arahan" class="py-7 px-6 border border-sekunder rounded-xl flex flex-col justify-center gap-y-1 items-center min-w-min w-full text-center min-h-[10rem]">
                        <h1 class="leading-5 text-center text-lg font-semibold tracking-wide mb-4">
                            Tunggu Instruksi Lebih Lanjut dari Admin
                        </h1>
                        <p class="w-full tracking-wide leading-relaxed">
                            Setelah mengisi formulir dan mengunggah dokumen, tunggu instruksi selanjutnya dari admin.
                        </p>
                        <p class="w-full tracking-wide leading-relaxed">
                            Admin akan memberikan informasi lebih lanjut mengenai proses selanjutnya.
                        </p>
                    </div>

                    <div title="menunggu hasil wawancara" class="py-7 px-6 border border-sekunder rounded-xl flex flex-col justify-center gap-y-1 items-center min-w-min w-full text-center min-h-[10rem]">
                        <h1 class="leading-5 text-center text-lg font-semibold tracking-wide mb-4">
                            Tunggu Pengumuman Hasil Wawancara
                        </h1>
                        <p class="w-full tracking-wide leading-relaxed">
                            Setelah proses wawancara, tunggu pengumuman hasilnya.
                        </p>
                        <p class="w-full tracking-wide leading-relaxed">
                            Admin akan memberikan informasi mengenai kelulusan Anda.
                        </p>
                    </div>

                    <div title="lihat informasi masuk sekolah" class="py-7 px-6 border border-sekunder rounded-xl flex flex-col justify-center gap-y-1 items-center min-w-min w-full text-center min-h-[10rem]">
                        <h1 class="leading-5 text-center text-lg font-semibold tracking-wide mb-4">
                            Lihat Informasi Masuk Sekolah
                        </h1>
                        <p class="w-full tracking-wide leading-relaxed">
                            Jika Anda dinyatakan lulus, lihat informasi mengenai masuk sekolah.
                        </p>
                        <p class="w-full tracking-wide leading-relaxed">
                            Pastikan Anda membawa fotokopi dokumen persyaratan saat mendaftar.
                        </p>
                    </div>

                    <div title="proses pendaftaran selesai" class="py-7 px-6 border border-sekunder rounded-xl flex flex-col justify-center gap-y-1 items-center min-w-min w-full text-center min-h-[10rem]">
                        <h1 class="leading-5 text-center text-lg font-semibold tracking-wide mb-4">
                            Proses Pendaftaran Selesai
                        </h1>
                        <p class="w-full tracking-wide leading-relaxed">
                            Selamat! Proses pendaftaran Anda telah selesai. Anda sekarang berhak untuk memulai tahun ajaran baru di sekolah <b class="text-sky-800">{{ App\Models\General::first()->school_name }}</b> ini.
                        </p>
                    </div>

                </div>
            </section> --}}
            
            
            @include('front.layouts.contact')
        </div>
        @include('front.dashboard.layouts.script')
        @stack('my-script')
    </div>
</body>
</html>