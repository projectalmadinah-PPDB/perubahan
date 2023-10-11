@extends('front.layouts.parent')

@section('title','Home')

@section('content')
<main class="w-full pt-14">
    <!-- hero section -->
    <section 
        class="w-full h-[30rem] bg-primer bg-cover bg-center flex tracking-wide flex-col justify-center items-center gap-y-4 text-center text-white"
        style="background-image: url('{{ 'storage/' . App\Models\Home::first()->image }}');">
        <h1 
            class="text-3xl md:text-4xl font-bold mb-0 leading-none w-5/12">
            {{ App\Models\Home::first()->title }}
        </h1>
        <div class="w-1/3 break-words">
            {!! App\Models\Home::first()->desc !!}
        </div>
        <div class="flex flex-row-reverse gap-x-4 mt-5">
            <a href="{{ route('informasi') }}" 
                class="text-sm p-2 px-4 tracking-wider border-2 rounded-lg hover:font-bold border-sekunder backdrop-blur-md hover:bg-sekunder/50 text-white duration-200"
            >Pelajari Lebih Lanjut</a>
            @if (!Auth::user())
            <a href="{{route('user.show')}}" 
            class="text-sm p-2 px-4 tracking-wider border-2 rounded-lg hover:font-bold border-sekunder bg-sekunder hover:bg-sekunder/50 text-white duration-200"
            >Daftar</a>
            @endif
        </div>
    </section>

    <!-- section -->
    @foreach ($sections as $index => $section)
    <section class="w-full bg-dasar @if ($index % 2 !== 0) flex-row-reverse @endif flex justify-around items-center py-14 px-20">
        <div class="w-5/12 px-5">
            <h1 class="text-3xl font-bold title">{{ $section->title }}</h1>
            <div class="leading-6 mt-6 tracking-wider text-justify">
                {!! $section->desc !!}
            </div>
        </div>
        <div class="w-5/12">
            <img src="{{ asset('storage/' . $section['image']) }}" class="w-full rounded-xl ring-2 ring-emerald-400 ring-offset-4">
        </div>
    </section>
    @endforeach
    
    {{-- alur --}}
    <div class="flex justify-center">
        <h1 class="mb-5 pt-5 mx-auto text-center text-3xl font-bold title">Alur Pendaftaran Siswa Baru.</h1>
    </div>
    @auth
        <section id="alur" class="w-full h-52 pt-16 select-none">
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
    @else
        <section id="alur" class="w-full h-52 pt-16 select-none">
            <div class="mx-auto container">
                <div class="w-11/12 lg:w-1/2 mx-auto">
                    <div class="flex items-center justify-between bg-gray-200 h-1.5 relative">
                        <div class="absolute w-full">
                            <div class="overflow-hidden h-1.5 flex rounded bg-gray-200">
                                <div style="width: 0%;" 
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
                            <div class="{{ $sedang }}">
                            </div>
                            <p class="absolute text-center left-1/2 -translate-x-1/2 -top-12 bg-sekunder w-32 rounded-full text-dasar shadow-lg text-xs tracking-wide leading-4 py-1 p-2 border border-sekunder ring-2 ring-offset-2 ring-sekunder">
                                <span class="font-medium text-sm">Kamu Disini!!</span>
                            </p>
                            <p class="absolute text-center left-1/2 -translate-x-1/2 top-10 text-sekunder w-32 rounded-md bg-dasar shadow-lg text-xs tracking-wide leading-4 py-1 p-2">
                                <span class="font-bold">Step 1 :</span><br>Mendaftar & Login
                            </p>
                        </div>
                        <div class="relative">
                            <div class="{{ $belum }}">
                            </div>
                            <p class="absolute text-center left-1/2 -translate-x-1/2 top-10 text-sekunder w-32 rounded-md bg-dasar shadow-lg text-xs tracking-wide leading-4 py-1 p-2">
                                <span class="font-bold">Step 2 :</span><br>Membayar Registrasi
                            </p>
                        </div>
                        <div class="relative">
                            <div class="{{ $belum }}">
                            </div>
                            <p class="absolute text-center left-1/2 -translate-x-1/2 top-10 text-sekunder w-32 rounded-md bg-dasar shadow-lg text-xs tracking-wide leading-4 py-1 p-2">
                                <span class="font-bold">Step 3 :</span><br>Mengisi Form & Upload Dokumen
                            </p>
                        </div>
                        <div class="relative">
                            <div class="{{ $belum }}">
                            </div>
                            <p class="absolute text-center left-1/2 -translate-x-1/2 top-10 text-sekunder w-32 rounded-md bg-dasar shadow-lg text-xs tracking-wide leading-4 py-1 p-2">
                                <span class="font-bold">Step 4 :</span><br>Melakukan Wawancara 
                            </p>
                        </div>
                        <div class="relative">
                            <div class="{{ $belum }}">
                            </div>
                            <p class="absolute text-center left-1/2 -translate-x-1/2 top-10 text-sekunder w-32 rounded-md bg-dasar shadow-lg text-xs tracking-wide leading-4 py-1 p-2">
                                <span class="font-bold">Step 5 :</span><br>Menunggu Pengumuman
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endauth

    {{-- informasi --}}
    <section 
        class="bg-sky-900 text-dasar pt-16 pb-10 px-20 flex flex-col items-center justify-center gap-y-2">
        <a href="{{ route('informasi') }}" class="inline-flex items-center rounded-[3rem] bg-emerald-200 px-2 py-1 text-xs font-medium text-emerald-700 ring-1 ring-inset ring-emerald-700">B.L.O.G</a>
        <h1 class="text-3xl font-bold title">Information.</h1>
        <p class="mt-2 mb-7 text-sm text-gray-200 tracking-wide">
            Baca beragam artikel terkait Sekolah Ar-Romusha dibawah ini.
        </p>
        <div class="swiper w-full">
            <div class="swiper-wrapper mx-auto w-full justify-start">
                @foreach ($article as $item)
                    <!-- foreach here -->
                <a href="{{ route('user.informasi.detail', $item->slug) }}" class="swiper-slide md:w-52 min-h-min max-h-52 bg-sky-900 border border-dasar rounded-xl py-5 px-8">
                    <article>
                        {{-- <img src="{{asset('/storage/'.$item['image'])}}" alt=""> --}}
                        <h1 class="text-xl mb-2 font-bold hover:text-gray-300 duration-200 text-gray-100 tracking-wide truncate">{{$item->title}}</h1>
                        <div class="line-clamp-3 leading-relaxed tracking-wide text-gray-200">
                            {!! $item->desc !!}
                        </div>
                        <div class="flex justify-start items-center gap-x-2 mt-3">
                            <span class="italic ring-1 ring-sekunder bg-transparent rounded-full py-1 px-2 text-xs font-medium lowercase" title="category">
                                @if ($item->category) {{ $item->category->name }} @else --- @endif
                            </span>
                            <span class="ring-1 rounded-md ring-sekunder bg-transparent text-center py-1 px-3 text-xs font-semibold">
                                Date : <span class="font-medium">{{ $item->created_at->format('H:i, d M Y') }}</span>
                            </span>
                        </div>
                    </article>
                </a>
                @endforeach
            </div>
            
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>

            <style>
                :root {
                --swiper-navigation-size: 1.2rem;
                --swiper-navigation-top-offset: 50%;
                --swiper-navigation-sides-offset: 10px;

                --swiper-pagination-color: #0d8b6a;
                --swiper-pagination-bottom: -5px;
                }

                /* .swiper-button-prev, .swiper-button-next {
                    padding: 20px;
                    border-radius: 50%;
                    background-color: aqua;
                } */

                .swiper {
                    padding-bottom: 30px;
                }
            </style>
            
            <!-- If we need navigation buttons -->
            <div id="btnPrev" class="swiper-button-prev py-6 px-6 bg-sekunder font-bold text-white rounded-full"></div>
            <div id="btnNext" class="swiper-button-next py-6 px-6 bg-sekunder font-bold text-white rounded-full"></div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
        <script type="module">
            const swiper = new Swiper('.swiper', {
                a11y: {
                    prevSlideMessage: 'Informasi Sebelumnya',
                    nextSlideMessage: 'Informasi Selanjutnya',
                },
                // Optional parameters
                direction: 'horizontal',
                autoHeight: false,
                loop: true,
                speed: 400,

                // If we need pagination
                pagination: {
                    el: '.swiper-pagination',
                },

                // autoplay
                autoplay: {
                    delay: 2000,
                },

                // Navigation arrows
                navigation: {
                    nextEl: '#btnNext',
                    prevEl: '#btnPrev',
                },

                // And if we need scrollbar
                scrollbar: true,
                breakpoints: {
                    // 320px
                    // 320: {
                    //     slidesPerView: 1,
                    //     spaceBetween: 20,
                    // },
                    // 480px
                    480: {
                        slidesPerView: 1,
                        spaceBetween: 20,
                    },
                    // 640px
                    640: {
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
                    // 789px
                    789: {
                        slidesPerView: 3,
                        spaceBetween: 20,
                    }
                },
            });
        </script>
    </section>

    <!-- Q&A -->
    <section 
        class="bg-dasar pt-16 pb-10 px-20 flex flex-col justify-start items-center">
        <a href="{{ route('qna') }}" class="inline-flex items-center rounded-[3rem] bg-emerald-200 px-2 py-1 text-xs font-medium text-emerald-700 ring-1 ring-inset ring-emerald-700">Q.&.A</a>
        <h1 class="mt-2 text-3xl font-bold title">Question and Answer.</h1>
        <p class="mt-2 mb-7 text-sm text-gray-700 tracking-wide">
            Temukan berbagai pertanyaan seputar pendaftaran Sekolah Ar-Romusha dibawah ini.
        </p>
        <div class="flex flex-col justify-start items-center gap-y-2 w-full px-10 sm:px-18 md:px-32">
            @foreach ($qna as $index => $item)
                <!-- foreach here -->
            <div class="dropdown w-full shadow-md rounded-[20px] border border-emerald-400">
                <div class="dropdown-title font-[600] p-2 px-5 text-[17px] flex justify-between items-center">
                    <p class="tracking-wider select-none">{{$item->question}}</p>
                </div>
                <div class="dropdown-content pb-3 px-7 tracking-wide hidden select-none">
                    {{$item->answer}}
                </div>
            </div>
            <!-- endforeach here -->
            @endforeach
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
</main>
@endsection