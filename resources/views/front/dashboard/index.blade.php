@extends('front.dashboard.layouts.parent')

@section('title','Dashboard')

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('content')
<main class="w-full min-h-screen h-auto">
    <!-- section one -->
    @if(!$user->payment)
        <section class="w-full py-7 px-10 lg:px-60 bg-dasar flex flex-col justify-center items-center gap-4">
            <!-- status pendaftaran -->
            <div class="flex flex-col gap-3 justify-center items-center w-full py-7 md:py-10 px-7 md:px-12 bg-sky-900 text-dasar rounded-xl shadow-xl border-2 border-primer">
                <h1 class="text-2xl md:text-3xl tracking-wide font-semibold text-center">Selamat Datang {{$user->name}}!</h1>
                <p class="tracking-wide text-sm md:text-lg text-center">
                    Silahkan Melakukan Pembayaran Administrasi Sebelum Melengkapi Data Diri
                </p>
                <a href="{{route('user.pay',$user->id)}}" class=" text-xs md:text-sm py-3 px-7 rounded-3xl border border-sekunder bg-sekunder hover:bg-sekunder/20 duration-200 text-dasar">
                    !Click Here!
                </a>
            </div>

            <!-- cta ikuti tes -->
            <div class="flex flex-col justify-center items-center gap-4">
            </div>

            <!-- alur pendaftaran dan status -->
        </section>

        {{-- alur --}}
        <section id="alur" class="w-full py-16 select-none">
            <div class="mx-auto container">
                <div class="w-11/12 lg:w-1/2 mx-auto">
                    <div class="flex items-center justify-between bg-gray-200 h-1.5 relative">
                        <div class="absolute w-full">
                            <div class="overflow-hidden h-1.5 flex rounded bg-gray-200">
                                <div style="
                                    width:25%
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
                        <div class="relative">
                            <div class="rounded-full w-6 h-6 bg-sekunder shadow-md ring-[3px] ring-offset-[3px] ring-sekunder text-center">
                                {{-- <i class="bi bi-check-lg text-white"></i> --}}
                            </div>
                            <p class="absolute text-center left-1/2 -translate-x-1/2 top-10 text-sekunder w-32 rounded-md bg-dasar shadow-lg text-xs tracking-wide leading-4 py-1 p-2">
                                <span class="font-bold">Step 2 :</span><br>Membayar Registrasi
                            </p>
                        </div>
                        <div class="relative">
                            <div class="rounded-full w-6 h-6 bg-dasar shadow-md text-center">
                                <i class="bi bi-check-lg text-white"></i>
                            </div>
                            <p class="absolute text-center left-1/2 -translate-x-1/2 top-10 text-sekunder w-32 rounded-md bg-dasar shadow-lg text-xs tracking-wide leading-4 py-1 p-2">
                                <span class="font-bold">Step 3 :</span><br>Mengisi Form & Upload dokumen
                            </p>
                        </div>
                        <div class="relative">
                            <div class="rounded-full w-6 h-6 bg-dasar shadow-md text-center">
                                <i class="bi bi-check-lg text-white"></i>
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
                            <p class="absolute text-center left-1/2 -translate-x-1/2 -top-12 bg-sekunder w-32 rounded-full text-dasar shadow-lg text-xs tracking-wide leading-4 py-1 p-2 border border-sekunder ring-2 ring-offset-2 ring-sekunder">
                                <span class="font-bold text-sm">Selamat!!</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section 
            class="py-16 px-5 md:px-10 lg:px-20 flex flex-col justify-start items-center">
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
    @else
        @if ($user->payment->status == 'pending')
        <section class="w-full py-7 px-10 lg:px-60 bg-dasar flex flex-col justify-center items-center gap-4">
            <!-- status pendaftaran -->
            <div class="flex flex-col gap-3 justify-center items-center w-full py-7 md:py-10 px-7 md:px-12 bg-sky-900 text-dasar rounded-xl shadow-xl border-2 border-primer">
                <h1 class="text-2xl md:text-3xl tracking-wide font-semibold text-center">Anda Sedang Melakukan Pembayaran {{$user->name}}!</h1>
                <p class="tracking-wide text-sm md:text-lg text-center">Pembayaran Anda Masi Dalam Proses/Anda Belum Membayar ? </p>
                <a href="{{$user->payment->link}}" class=" text-xs md:text-sm py-3 px-7 rounded-3xl border border-sekunder bg-sekunder hover:bg-sekunder/20 duration-200 text-dasar">
                    Silahkan Tekan Tombol Berikut
                </a>
            </div>

            <!-- cta ikuti tes -->
            <div class="flex flex-col justify-center items-center gap-4">
            </div>

            <!-- alur pendaftaran dan status -->
        </section>
        <section id="alur" class="w-full py-16 select-none">
            <div class="mx-auto container">
                <div class="w-11/12 lg:w-1/2 mx-auto">
                    <div class="flex items-center justify-between bg-gray-200 h-1.5 relative">
                        <div class="absolute w-full">
                            <div class="overflow-hidden h-1.5 flex rounded bg-gray-200">
                                <div style="
                                    width:25%
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
                            <div class="rounded-full w-6 h-6 bg-sekunder shadow-md ring-[3px] ring-offset-[3px] ring-sekunder text-center">
                                {{-- <i class="bi bi-check-lg text-white"></i> --}}
                            </div>
                            <p class="absolute text-center left-1/2 -translate-x-1/2 top-10 text-sekunder w-32 rounded-md bg-dasar shadow-lg text-xs tracking-wide leading-4 py-1 p-2">
                                <span class="font-bold">Step 2 :</span><br>Membayar Registrasi
                            </p>
                        </div>
                        <div class="relative">
                            <div class="rounded-full w-6 h-6 bg-dasar shadow-md text-center">
                                <i class="bi bi-check-lg text-white"></i>
                            </div>
                            <p class="absolute text-center left-1/2 -translate-x-1/2 top-10 text-sekunder w-32 rounded-md bg-dasar shadow-lg text-xs tracking-wide leading-4 py-1 p-2">
                                <span class="font-bold">Step 3 :</span><br>Mengisi Form & Upload dokumen
                            </p>
                        </div>
                        <div class="relative">
                            <div class="rounded-full w-6 h-6 bg-dasar shadow-md text-center">
                                <i class="bi bi-check-lg text-white"></i>
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
                            <p class="absolute text-center left-1/2 -translate-x-1/2 -top-12 bg-sekunder w-32 rounded-full text-dasar shadow-lg text-xs tracking-wide leading-4 py-1 p-2 border border-sekunder ring-2 ring-offset-2 ring-sekunder">
                                <span class="font-bold text-sm">Selamat!!</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section 
            class="py-16 px-5 md:px-10 lg:px-20 flex flex-col justify-start items-center">
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
        @elseif ($user->payment->status == 'expired')
        <section class="w-full py-7 px-10 lg:px-60 bg-dasar flex flex-col justify-center items-center gap-4">
                <!-- status pendaftaran -->
                <div class="flex flex-col gap-3 justify-center items-center w-full py-7 md:py-10 px-7 md:px-12 bg-sky-900 text-dasar rounded-xl shadow-xl border-2 border-primer">
                    <h1 class="text-2xl md:text-3xl tracking-wider font-semibold text-center">Halo {{$user->name}}, Sepertinya Kamu Tidak Melakukan Pembayaran Lebih Dari 24 Jam!</h1>
                    <p class="tracking-wide text-sm md:text-lg text-center">Jika Ingin Melakukan Ulang Pembayaran Silahkan</p>
                    <a href="{{route('user.pay',$user->id)}}" class=" text-xs md:text-sm py-3 px-7 rounded-3xl border border-sekunder bg-sekunder hover:bg-sekunder/20 duration-200 text-dasar">
                        Lakukan Pembayaran Ulang Disini
                    </a>
                </div>

                <!-- cta ikuti tes -->
                <div class="flex flex-col justify-center items-center gap-4">
                </div>

                <!-- alur pendaftaran dan status -->
        </section>
        <section id="alur" class="w-full py-16 select-none">
            <div class="mx-auto container">
                <div class="w-11/12 lg:w-1/2 mx-auto">
                    <div class="flex items-center justify-between bg-gray-200 h-1.5 relative">
                        <div class="absolute w-full">
                            <div class="overflow-hidden h-1.5 flex rounded bg-gray-200">
                                <div style="
                                    width:25%
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
                            <div class="rounded-full w-6 h-6 bg-sekunder shadow-md ring-[3px] ring-offset-[3px] ring-sekunder text-center">
                                {{-- <i class="bi bi-check-lg text-white"></i> --}}
                            </div>
                            <p class="absolute text-center left-1/2 -translate-x-1/2 top-10 text-sekunder w-32 rounded-md bg-dasar shadow-lg text-xs tracking-wide leading-4 py-1 p-2">
                                <span class="font-bold">Step 2 :</span><br>Membayar Registrasi
                            </p>
                        </div>
                        <div class="relative">
                            <div class="rounded-full w-6 h-6 bg-dasar shadow-md text-center">
                                <i class="bi bi-check-lg text-white"></i>
                            </div>
                            <p class="absolute text-center left-1/2 -translate-x-1/2 top-10 text-sekunder w-32 rounded-md bg-dasar shadow-lg text-xs tracking-wide leading-4 py-1 p-2">
                                <span class="font-bold">Step 3 :</span><br>Mengisi Form & Upload dokumen
                            </p>
                        </div>
                        <div class="relative">
                            <div class="rounded-full w-6 h-6 bg-dasar shadow-md text-center">
                                <i class="bi bi-check-lg text-white"></i>
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
                            <p class="absolute text-center left-1/2 -translate-x-1/2 -top-12 bg-sekunder w-32 rounded-full text-dasar shadow-lg text-xs tracking-wide leading-4 py-1 p-2 border border-sekunder ring-2 ring-offset-2 ring-sekunder">
                                <span class="font-bold text-sm">Selamat!!</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section 
            class="py-16 px-5 md:px-10 lg:px-20 flex flex-col justify-start items-center">
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
        @elseif($user->payment->status == 'berhasil')
            @if (!$user->student)
                    <section class="w-full py-7 px-10 lg:px-60 bg-dasar flex flex-col justify-center items-center gap-4">
                        <!-- status pendaftaran -->
                        <div class="flex flex-col gap-3 justify-center items-center w-full py-7 md:py-10 px-7 md:px-12 bg-sky-900 text-dasar rounded-xl shadow-xl border-2 border-primer">
                            <h1 class="text-2xl md:text-3xl tracking-wider font-semibold text-center">
                                Selamat Anda Telah Melakukan Pembayaran Untuk PPDB {{$user->name}}!
                            </h1>
                            <p class="tracking-wide text-sm md:text-lg text-center">
                                Lengkapi Data diri kamu untuk melanjutkan proses pendaftaran, melalui tombol dibawah ini.
                            </p>
                            <a href="{{route('user.kelengkapan')}}" class=" text-xs md:text-sm py-3 px-7 rounded-3xl border border-sekunder bg-sekunder hover:bg-sekunder/20 duration-200 text-dasar">
                                !Click! Untuk Lengkapi Data Diri 
                            </a>
                        </div>

                        <!-- cta ikuti tes -->
                        <div class="flex flex-col justify-center items-center gap-4">
                        </div>

                        <!-- alur pendaftaran dan status -->
                    </section>
                    <section id="alur" class="w-full py-16 select-none">
                        <div class="mx-auto container">
                            <div class="w-11/12 lg:w-1/2 mx-auto">
                                <div class="flex items-center justify-between bg-gray-200 h-1.5 relative">
                                    <div class="absolute w-full">
                                        <div class="overflow-hidden h-1.5 flex rounded bg-gray-200">
                                            <div style="
                                                width:50%
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
                                        <div class="rounded-full w-6 h-6 bg-sekunder shadow-md ring-[3px] ring-offset-[3px] ring-sekunder text-center">
                                            {{-- <i class="bi bi-check-lg text-white"></i> --}}
                                        </div>
                                        <p class="absolute text-center left-1/2 -translate-x-1/2 top-10 text-sekunder w-32 rounded-md bg-dasar shadow-lg text-xs tracking-wide leading-4 py-1 p-2">
                                            <span class="font-bold">Step 3 :</span><br>Mengisi Form & Upload dokumen
                                        </p>
                                    </div>
                                    <div class="relative">
                                        <div class="rounded-full w-6 h-6 bg-dasar shadow-md text-center">
                                            <i class="bi bi-check-lg text-white"></i>
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
                                        <p class="absolute text-center left-1/2 -translate-x-1/2 -top-12 bg-sekunder w-32 rounded-full text-dasar shadow-lg text-xs tracking-wide leading-4 py-1 p-2 border border-sekunder ring-2 ring-offset-2 ring-sekunder">
                                            <span class="font-bold text-sm">Selamat!!</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section 
                    class="py-16 px-5 md:px-10 lg:px-20 flex flex-col justify-start items-center">
                    <h1 class="mt-2 text-3xl mb-8 font-bold title">Informasi Untuk Melengkapi Data Diri</h1>
                    <div class="flex flex-col justify-start items-center gap-y-2 w-full px-10 sm:px-18 md:px-32">
                        <!-- foreach here -->
                        <div class="dropdown w-full shadow-md rounded-[20px] border border-emerald-400">
                            <div class="dropdown-title font-medium p-3 px-7 text-xl flex justify-between items-center">
                                <p class="tracking-wide">Apa Aja Yang Disiapkan Untuk Melengkapi Data Diri</p>
                            </div>
                            <div class="dropdown-content pb-5 px-7 tracking-wide hidden">
                                Yang Siapkan Untuk Melengkapi Data Diri
                                <ul>
                                    <li>Data Data Tentang Diri Anda Dan Orang Tua</li>
                                    <li>Kartu Keluarga</li>
                                    <li>Kartu Ijazah <strong>Pendidikan Terakhir</strong></li>
                                    <li>Rapor <strong>Pendidikan Terakhir</strong></li>
                                    <li>Akte Anda</li>
                                    <li>Silahkan Buat 4 File PDF , Seperti File Pertama Kartu Keluarga , Kedua Kartu Ijazah, Ketiga Rapor , Keempat Akte</li>
                                </ul>
                            </div>
                        </div>
                        <!-- endforeach here -->
                        <!-- foreach here -->
                        <div class="dropdown w-full shadow-md rounded-[20px] border border-emerald-400">
                            <div class="dropdown-title font-medium p-3 px-7 text-xl flex justify-between items-center">
                                <p class="tracking-wide">Anda Kebigungan Dengan Alur Lengkapi Data Diri?</p>
                            </div>
                            <div class="dropdown-content pb-5 px-7 tracking-wide hidden">
                                Silahkan Hubungi Kami Lewat Whatshapp
                                <a href="https://web.whatsapp.com/+6282346739790" class="text-larangan">Silahkan Click +6282346739790</a>
                            </div>
                        </div>
                        <!-- endforeach here -->
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
            @elseif(!$user->document)
                    @if (session('pribadi'))
                        <section id="alertProfile" class="w-full pt-3 pb-2 px-10 lg:px-60 bg-gradient-to-b from-primer to-sky-900 flex flex-col justify-center items-center gap-5">
                            <div class="flex justify-between items-center w-full py-1 px-5 bg-berhasil text-dasar rounded-full">
                                <p class="">{{session('pribadi')}}</p>
                                <span role="button" id="closeAlert" onclick="document.getElementById('alertProfile').classList.add('hidden')" 
                                    class="px-1.5 rounded-full border border-dasar hover:bg-dasar text-dasar hover:text-primer duration-200">
                                    &#10006;
                                </span>
                            </div>
                        </section>
                    @endif
                    <section class="w-full py-7 px-10 lg:px-60 bg-dasar flex flex-col justify-center items-center gap-4">
                        <!-- status pendaftaran -->
                        <div class="flex flex-col gap-3 justify-center items-center w-full py-7 md:py-10 px-7 md:px-12 bg-sky-900 text-dasar rounded-xl shadow-xl border-2 border-primer">
                            <h1 class="text-2xl md:text-3xl tracking-wider font-semibold text-center">Selamat Anda Telah Melengkapi Data Pribadi {{$user->name}}!</h1>
                            <p class="tracking-wide text-sm md:text-lg text-center">Anda Sudah Melengkapi Data Diri Dan Orang Tua Silahkan Masukkan Document Anda</p>
                            <a href="{{route('user.document')}}" class=" text-xs md:text-sm py-3 px-7 rounded-3xl border border-sekunder bg-sekunder hover:bg-sekunder/20 duration-200 text-dasar">
                                !Click! Untuk Lengkapi Document
                            </a>
                        </div>

                        <!-- cta ikuti tes -->
                        <div class="flex flex-col justify-center items-center gap-4">
                        </div>

                        <!-- alur pendaftaran dan status -->
                    </section>
                    <section id="alur" class="w-full py-16 select-none">
                        <div class="mx-auto container">
                            <div class="w-11/12 lg:w-1/2 mx-auto">
                                <div class="flex items-center justify-between bg-gray-200 h-1.5 relative">
                                    <div class="absolute w-full">
                                        <div class="overflow-hidden h-1.5 flex rounded bg-gray-200">
                                            <div style="
                                                width:50%
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
                                        <div class="rounded-full w-6 h-6 bg-sekunder shadow-md ring-[3px] ring-offset-[3px] ring-sekunder text-center">
                                            {{-- <i class="bi bi-check-lg text-white"></i> --}}
                                        </div>
                                        <p class="absolute text-center left-1/2 -translate-x-1/2 top-10 text-sekunder w-32 rounded-md bg-dasar shadow-lg text-xs tracking-wide leading-4 py-1 p-2">
                                            <span class="font-bold">Step 3 :</span><br>Mengisi Form & Upload dokumen
                                        </p>
                                    </div>
                                    <div class="relative">
                                        <div class="rounded-full w-6 h-6 bg-dasar shadow-md text-center">
                                            <i class="bi bi-check-lg text-white"></i>
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
                                        <p class="absolute text-center left-1/2 -translate-x-1/2 -top-12 bg-sekunder w-32 rounded-full text-dasar shadow-lg text-xs tracking-wide leading-4 py-1 p-2 border border-sekunder ring-2 ring-offset-2 ring-sekunder">
                                            <span class="font-bold text-sm">Selamat!!</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section 
                    class="py-16 px-5 md:px-10 lg:px-20 flex flex-col justify-start items-center">
                    <h1 class="mt-2 text-3xl mb-8 font-bold title">Informasi Untuk Melengkapi Data Diri</h1>
                    <div class="flex flex-col justify-start items-center gap-y-2 w-full px-10 sm:px-18 md:px-32">
                        <!-- foreach here -->
                        <div class="dropdown w-full shadow-md rounded-[20px] border border-emerald-400">
                            <div class="dropdown-title font-medium p-3 px-7 text-xl flex justify-between items-center">
                                <p class="tracking-wide">Apa Aja Yang Disiapkan Ketika Ingin Melengkapi Data Diri</p>
                            </div>
                            <div class="dropdown-content pb-5 px-7 tracking-wide hidden">
                                Yang Siapkan Untuk Melengkapi Data Diri
                                <ul>
                                    <li>1. Data Data Tentang Diri Anda Dan Orang Tua</li>
                                    <li>2. Kartu Keluarga</li>
                                    <li>3. Kartu Ijazah <strong>Pendidikan Terakhir</strong></li>
                                    <li>4. Rapor <strong>Pendidikan Terakhir</strong></li>
                                    <li>5. Akte Anda</li>
                                    <li>6. Silahkan Buat 4 File PDF , Seperti File Pertama Kartu Keluarga , Kedua Kartu Ijazah, Ketiga Rapor , Keempat Akte</li>
                                </ul>
                            </div>
                        </div>
                        <!-- endforeach here -->
                        <!-- foreach here -->
                        <div class="dropdown w-full shadow-md rounded-[20px] border border-emerald-400">
                            <div class="dropdown-title font-medium p-3 px-7 text-xl flex justify-between items-center">
                                <p class="tracking-wide">Anda Kebigungan Dengan Alur Lengkapi Data Diri?</p>
                            </div>
                            <div class="dropdown-content pb-5 px-7 tracking-wide hidden">
                                Silahkan Hubungi Kami Lewat Whatshapp
                                <a href="https://web.whatsapp.com/+6282346739790" class="text-larangan">Silahkan Click +6282346739790</a>
                            </div>
                        </div>
                        <!-- endforeach here -->
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
            @else
                    @if (session('lengkap'))
                    <section id="alertProfile" class="w-full pt-3 pb-2 px-10 lg:px-60 bg-gradient-to-b from-primer to-sky-900 flex flex-col justify-center items-center gap-5">
                        <div class="flex justify-between items-center w-full py-1 px-5 bg-berhasil text-dasar rounded-full">
                            <p class="">{{session('lengkap')}}</p>
                            <span role="button" id="closeAlert" onclick="document.getElementById('alertProfile').classList.add('hidden')" 
                                class="px-1.5 rounded-full border border-dasar hover:bg-dasar text-dasar hover:text-primer duration-200">
                                &#10006;
                            </span>
                        </div>
                    </section>
                    @endif
                    <section class="w-full py-7 px-10 lg:px-60 bg-dasar flex flex-col justify-center items-center gap-4">
                        <!-- status pendaftaran -->
                        <div class="flex flex-col gap-3 justify-center items-center w-full py-7 md:py-10 px-7 md:px-12 bg-sky-900 text-dasar rounded-xl shadow-xl border-2 border-primer">
                            <h1 class="text-2xl md:text-3xl tracking-wider font-semibold text-center">Semua Data {{$user->name}} berhasil dilengkapi!</h1>
                            <p class="tracking-wide text-sm md:text-lg text-center">Selamat Datang Kamu Sudah Melengkapi Semua Pendaftaran Silahkan Menunggu Pesan Dari Admin </p>
                            <a href="{{route('user.profile')}}" class=" text-xs md:text-sm py-3 px-7 rounded-3xl border border-sekunder bg-sekunder hover:bg-sekunder/20 duration-200 text-dasar">
                                Halo Data Diri Saya {{$user->name}}
                            </a>
                        </div>

                        <!-- cta ikuti tes -->
                        <div class="flex flex-col justify-center items-center gap-4">
                        </div>

                        <!-- alur pendaftaran dan status -->
                    </section>
                    <section id="alur" class="w-full py-16 select-none">
                        <div class="mx-auto container">
                            <div class="w-11/12 lg:w-1/2 mx-auto">
                                <div class="flex items-center justify-between bg-gray-200 h-1.5 relative">
                                    <div class="absolute w-full">
                                        <div class="overflow-hidden h-1.5 flex rounded bg-gray-200">
                                            <div style="
                                                width:75%
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
                                        <p class="absolute text-center left-1/2 -translate-x-1/2 -top-12 bg-sekunder w-32 rounded-full text-dasar shadow-lg text-xs tracking-wide leading-4 py-1 p-2 border border-sekunder ring-2 ring-offset-2 ring-sekunder">
                                            <span class="font-bold text-sm">Selamat!!</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section 
                    class="py-16 px-5 md:px-10 lg:px-20 flex flex-col justify-start items-center">
                    <h1 class="mt-2 text-3xl mb-8 font-bold title">Pengumuman</h1>
                    <div class="flex flex-col justify-start items-center gap-y-2 w-full px-10 sm:px-18 md:px-32">
                        <!-- foreach here -->
                        <div class="dropdown w-full shadow-md rounded-[20px] border border-emerald-400">
                            <div class="dropdown-title font-medium p-3 px-7 text-xl flex justify-between items-center">
                                <p class="tracking-wide">Apa Aja Yang Disiapkan Ketika Ingin Melengkapi Data Diri</p>
                            </div>
                            <div class="dropdown-content pb-5 px-7 tracking-wide hidden">
                                Yang Siapkan Untuk Melengkapi Data Diri
                                <ul>
                                    <li>1. Data Data Tentang Diri Anda Dan Orang Tua</li>
                                    <li>2. Kartu Keluarga</li>
                                    <li>3. Kartu Ijazah <strong>Pendidikan Terakhir</strong></li>
                                    <li>4. Rapor <strong>Pendidikan Terakhir</strong></li>
                                    <li>5. Akte Anda</li>
                                    <li>6. Silahkan Buat 4 File PDF , Seperti File Pertama Kartu Keluarga , Kedua Kartu Ijazah, Ketiga Rapor , Keempat Akte</li>
                                </ul>
                            </div>
                        </div>
                        <!-- endforeach here -->
                        <!-- foreach here -->
                        <div class="dropdown w-full shadow-md rounded-[20px] border border-emerald-400">
                            <div class="dropdown-title font-medium p-3 px-7 text-xl flex justify-between items-center">
                                <p class="tracking-wide">Anda Kebigungan Dengan Alur Lengkapi Data Diri?</p>
                            </div>
                            <div class="dropdown-content pb-5 px-7 tracking-wide hidden">
                                Silahkan Hubungi Kami Lewat Whatshapp
                                <a href="https://web.whatsapp.com/+6282346739790" class="text-larangan">Silahkan Click +6282346739790</a>
                            </div>
                        </div>
                        <!-- endforeach here -->
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
                    @endif
            @endif
        @endif
        <!-- pengumuman -->
    
        <!-- footer -->
        <footer
            class="py-1 px-3 text-end text-xs bg-transparent fixed bottom-0 w-full text-primer">
            © 2023 - 
            <a class="tracking-wide" href="https://tailwind-elements.com/"
                >Sekolah Ar-Romusha</a
            >
        </footer>
</main>
@endsection
@push('my-script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@if (session('pribadi'))
<script>
  toastr.options = {
    "progressBar" : true,
    "closeButton" : true
}
  toastr.success(" session('pribadi')");
</script>
@elseif(session('lengkapi'))
<script>
    Swal.fire(
    '{{session('lengkapi')}}!',
    'You clicked the button!',
    'success'
    )
  </script>
@elseif(session('success'))
<script>
Swal.fire(
    '{{session('success')}}!',
    'You clicked the button!',
    'success'
    )
</script>
@else
<script>
toastr.options = {
  "progressBar" : true,
  "closeButton" : true
}
toastr.warning("{{ session('edit') }}");
</script>
@endif
@endpush