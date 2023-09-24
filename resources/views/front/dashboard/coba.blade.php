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

            <section class="w-full py-7 px-10 lg:px-60 bg-transparent flex flex-col justify-center items-center gap-4">
                <!-- status pendaftaran -->
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
                        <a href="{{route('user.pay',$user->id)}}" 
                            class="{{ $buttonStep }}">
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
                                    Tekan tombol dibawah ini untuk melengkapi data diri anda
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
                                                @if (!$user->student)
                                                width: 50%;
                                                @elseif (!$user->document)
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
                                <div class="{{ $sudah }}">
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
                                    ">
                                    @if ($user->payment && $user->payment->status == 'berhasil' && $user->student && $user->parents)
                                        <i class="bi bi-check-lg text-white"></i>
                                    @endif
                                </div>
                                <p class="absolute text-center left-1/2 -translate-x-1/2 top-10 text-sekunder w-32 rounded-md bg-dasar shadow-lg text-xs tracking-wide leading-4 py-1 p-2">
                                    <span class="font-bold">Step 3 :</span><br>Melengkapi data diri
                                </p>
                            </div>
                            <div class="relative">
                                <div class="
                                    @if (!$user->document) {{ $sedang }}
                                    @else {{ $sudah }} @endif
                                    ">
                                    @if ($user->document)
                                        <i class="bi bi-check-lg text-white"></i>
                                    @endif
                                </div>
                                <p class="absolute text-center left-1/2 -translate-x-1/2 top-10 text-sekunder w-32 rounded-md bg-dasar shadow-lg text-xs tracking-wide leading-4 py-1 p-2">
                                    <span class="font-bold">Step 4 :</span><br>Mengupload dokumen
                                </p>
                            </div>
                            <div class="relative">
                                <div class="
                                    @if ($user->student && $user->parents && $user->document) {{ $sedang }}
                                    @else {{ $belum }}  @endif">
                                    @if ($user->status == 'Lulus')
                                        <i class="bi bi-check-lg text-white"></i>
                                    @endif
                                </div>
                                <p class="absolute text-center left-1/2 -translate-x-1/2 top-10 text-sekunder w-32 rounded-md bg-dasar shadow-lg text-xs tracking-wide leading-4 py-1 p-2">
                                    <span class="font-bold">Step 5 :</span><br>Menunggu Pengumuman
                                </p>
                                @if (($user->student && $user->parents && $user->document) || $user->status == 'Lulus')
                                    <p class="absolute text-center left-1/2 -translate-x-1/2 -top-12 bg-sekunder w-32 rounded-full text-dasar shadow-lg text-xs tracking-wide leading-4 py-1 p-2 border border-sekunder ring-2 ring-offset-2 ring-sekunder">
                                        <span class="font-bold text-sm">
                                            @if ($user->student && $user->parents && $user->document)
                                            Yeyy!!
                                            @elseif ($user->status == 'Lulus')
                                            Selamat!!
                                            @endif
                                        </span>
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section
                class="pt-16 pb-10 px-5 md:px-10 lg:px-20 flex flex-col justify-start items-center">
                <h1 class="mt-2 text-3xl mb-8 font-bold title">
                    Informasi Singkat
                </h1>
                <div class="flex flex-col justify-start items-center gap-y-2 w-full px-10 sm:px-18 md:px-32">
                    {{-- foreach --}}
                    <div class="dropdown w-full shadow-md rounded-[20px] border border-emerald-400">
                        <div class="dropdown-title font-medium p-3 px-7 text-xl flex justify-between items-center">
                            <p class="tracking-wide">Apa Aja Yang Disiapkan Ketika Ingin Membayar?</p>
                        </div>
                        <div class="dropdown-content pb-5 px-7 tracking-wide hidden">
                            Yang Siapkan Untuk Membayar Uang Administrasi
                            <ul>
                                <li>1. Siapkan Uang Sebesar 100Ribu</li>
                                <li>2. Memiliki Virtual Account</li>
                                <li>3. Mengetahui Cara Membayar Online/Paymet Gateaway</li>
                            </ul>
                        </div>
                    </div>
                    {{-- endforeach --}}
                </div>

            </section>
        
            <section 
                class="pt-16 pb-10 px-5 md:px-10 lg:px-20 flex flex-col justify-start items-center">
                <h1 class="mt-2 text-3xl mb-8 font-bold title">Informasi Untuk Membayar</h1>
                <div class="flex flex-col justify-start items-center gap-y-2 w-full px-10 sm:px-18 md:px-32">
                    <!-- foreach here -->
                    <div class="dropdown w-full shadow-md rounded-[20px] border border-emerald-400">
                        <div class="dropdown-title font-medium p-3 px-7 text-xl flex justify-between items-center">
                            <p class="tracking-wide">Apa Aja Yang Disiapkan Ketika Ingin Membayar?</p>
                        </div>
                        <div class="dropdown-content pb-5 px-7 tracking-wide hidden">
                            Yang Siapkan Untuk Membayar Uang Administrasi
                            <ul>
                                <li>1. Siapkan Uang Sebesar 100Ribu</li>
                                <li>2. Memiliki Virtual Account</li>
                                <li>3. Mengetahui Cara Membayar Online/Paymet Gateaway</li>
                            </ul>
                        </div>
                    </div>
                    <!-- endforeach here -->
                    <!-- foreach here -->
                    <div class="dropdown w-full shadow-md rounded-[20px] border border-emerald-400">
                        <div class="dropdown-title font-medium p-3 px-7 text-xl flex justify-between items-center">
                            <p class="tracking-wide">Anda Kebigungan Dengan Alur Pembayaran?</p>
                        </div>
                        <div class="dropdown-content pb-5 px-7 tracking-wide hidden">
                            Silahkan Hubungi Kami Lewat Whatshapp
                            <a href="https://web.whatsapp.com/+6282346739790" class="text-larangan">Silahkan Click +6282346739790</a>
                        </div>
                    </div>
                    <!-- endforeach here -->
                    @foreach ($announcements as $announ)
                    <div class="dropdown w-full shadow-md rounded-[20px] border border-emerald-400">
                        <div class="dropdown-title font-medium p-3 px-7 text-xl flex justify-between items-center">
                            <p class="tracking-wide">{{ $announ->title }}</p>
                        </div>
                        <div class="dropdown-content pb-5 px-7 tracking-wide hidden">
                            {!! $announ->desc !!}
                        </div>
                    </div>
                    @endforeach
                    <!-- endforeach here -->
                    <style>
                        .dropdown-content ul li,
                        .dropdown-content ol li {
                            list-style-type: auto!important;
                        }
                    </style>
                </div>

                <script>
                    // accordion question
                        const ItemHeaders = document.querySelectorAll('div.dropdown-title');
                        
                        ItemHeaders.forEach(ItemHeader => {
                            ItemHeader.addEventListener('click', event => {
                                ItemHeader.classList.toggle('show');
                                
                                const ItemBody = ItemHeader.nextElementSibling;
                                
                                if(ItemHeader.classList.contains('show')) {
                                    ItemBody.classList.remove('hidden');
                                } else {
                                    ItemBody.classList.add('hidden');
                                }
                            })
                        })
                </script>
            </section>
            
            {{-- kotak bantuan --}}
            <section class="pt-5 pb-10 px-5 md:px-10 lg:px-60">
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