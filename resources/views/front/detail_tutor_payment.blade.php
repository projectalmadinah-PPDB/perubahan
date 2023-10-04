@extends('front.layouts.parent')

@section('title','Detail Informasi')

@section('content')
<main class="w-full pt-14">
    <!-- hero section -->
    <div class="pt-10 px-32">
        <section 
            class="w-full h-[20rem] bg-primer bg-cover bg-center flex flex-col justify-end items-end gap-y-4 text-center text-white"
            style="background-image: url('');">
            <h1 
                class="text-lg font-bold mb-0 leading-none p-4 flex items-center gap-x-2">
                <img src="./images/logo_only_white.svg" alt="" class="w-7">
                Sekolah {{ App\Models\General::first()->school_name }}.
            </h1>
        </section>
    </div>

    <!-- artikel -->
    <section class="w-full px-7 md:px-40 py-10">
        <article class="prose prose-sm md:prose-lg prose-slate !max-w-[90ch]">
            <h1 class="!mb-4 !text-4xl title">Tutorial Pembayaran Menggunakan iPaymu</h1>
            <div class="flex justify-start items-center gap-x-2">
                <span class="ring-1 ring-sekunder py-1 px-3 italic rounded-full text-sekunder bg-dasar text-xs transition-all duration-200 hover:ring-offset-2 font-medium"
                        >Created By : Admin</span>
                <span class="ring-1 ring-sekunder bg-dasar py-1 px-3 text-xs font-semibold">
                    Date : <span class="font-medium italic">kapan hari</span>
                </span>
            </div>
            <div class="tracking-wide leading-loose">
                <!-- Table of Contents -->
                
                <!-- end of Table of Contents -->

                <p class="indent-10">
                    Proses pendaftaran online semakin mudah dengan bantuan <a href="https://ipaymu.com/" target="_blank" class="text-sky-600 hover:text-sky-800 duration-200 font-semibold italic">iPaymu</a> sebagai metode pembayaran yang handal dan aman. Dengan <a href="https://ipaymu.com/" target="_blank" class="text-sky-600 hover:text-sky-800 duration-200 font-semibold italic">iPaymu</a>, kamu dapat melakukan pembayaran biaya pendaftaran dalam hitungan menit, menghemat waktu berharga Anda. Panduan ini akan mengajarkan kamu terkait langkah-langkah simpel untuk menyelesaikan pembayaran pendaftaran secara efisien menggunakan platform <a href="https://ipaymu.com/" target="_blank" class="text-sky-600 hover:text-sky-800 duration-200 font-semibold italic">iPaymu</a>, sehingga kamu dapat fokus pada langkah selanjutnya dalam proses pendaftaran Anda.
                </p>
            
                <h3>Langkah-langkah:</h3>
            
                <h4>1. Lakukan Pendaftaran terlebih dahulu</h4>
                <img src="link_gambar_langkah1.jpg" alt="Langkah 1">
                <p>Pastikan kamu sudah melakukan pendaftaran peserta didik baru pada formulir yang sudah disediakan di halaman <a class="text-sky-600 hover:text-sky-800 duration-200 italic" href="{{ route('user.show') }}">Daftar</a>.</p>
            
                <h4>2. Mengakses Link Pembayaran</h4>
                <img src="link_gambar_langkah2.jpg" alt="Langkah 2">
                <p>Setelah mendaftar, pastikan kamu berada di halaman beranda Calon Siswa seperti gambar diatas, lalu tekan tombol "Bayar Disini" untuk mengarahkan kamu ke halaman detail pembayaran yang akan kamu lakukan.</p>
            
                <h4>3. Melihat Detail Pembayaran</h4>
                <img src="link_gambar_langkah3.jpg" alt="Langkah 3">
                <p>Anda akan melihat halaman dengan detail biaya administrasi dan instruksi pembayaran. Pastikan untuk mencatat nomor rekening dan jumlah biaya.</p>
            
                <h4>4. Menggunakan Tombol "Bayar Sekarang"</h4>
                <img src="link_gambar_langkah4.jpg" alt="Langkah 4">
                <p>Klik tombol "Bayar Sekarang dengan iPaymu" untuk melanjutkan proses pembayaran.</p>
            
                <h4>5. Melakukan Pembayaran di iPaymu</h4>
                <img src="link_gambar_langkah5.jpg" alt="Langkah 5">
                <p>Anda akan diarahkan ke halaman pembayaran iPaymu. Masukkan informasi yang diperlukan dan pilih metode pembayaran yang diinginkan.</p>
            
                <h4>6. Verifikasi Pembayaran</h4>
                <p>Setelah melakukan pembayaran, kamu akan menerima email konfirmasi dari iPaymu. Pastikan untuk menyimpan bukti pembayaran sebagai referensi.</p>
                
                <h3>Kesimpulan:</h3>
                <p>
                    Dengan mengikuti langkah-langkah di atas, kamu dapat dengan mudah melakukan pembayaran administrasi untuk pendaftaran PPDB online menggunakan iPaymu. Jika kamu mengalami kendala, jangan ragu untuk menghubungi tim dukungan kami.
                </p>
            
                <p>Semoga sukses dalam pendaftaran!</p>
            </div>
        </article>
    </section>

    <!-- list article -->
    <section class="w-full pt-20 pb-16 px:10 md:px-20 flex flex-col justify-start items-center">
        <span
            class="inline-flex items-center rounded-[3rem] bg-emerald-200 px-2 py-1 text-xs font-medium text-emerald-700 ring-1 ring-inset ring-emerald-700 mb-3"
        >I.N.F.O</span>
        <h1 class="text-3xl font-bold title">Artikel Terbaru.</h1>
        <p class="mt-2 mb-14 text-sm text-gray-700 tracking-wide">
            Baca beragam artikel dengan kategori yang berkaitan dengan artikel ini.
        </p>
        <div class="flex justify-start items-start flex-wrap w-full gap-4 relative pb-10">
            <!-- if -->
            <a href="article.html" class="absolute bottom-2 left-1/2 -translate-x-1/2 bg-sekunder ring-2 ring-sekunder ring-offset-2 hover:ring-offset-4 py-2 px-4 text-sm duration-200 text-dasar font-semibold tracking-wide">Lebih Banyak</a>
            <!-- endif -->
            
            @foreach ($article as $item)
                <a href="{{route('user.informasi.detail',$item->slug)}}" class="group w-[19rem] ring-1 ring-sekunder flex flex-col items-center justify-start hover:rounded-2xl hover:bg-slate-50 transition-all duration-200 hover:ring-offset-4">
                    <img src="{{ asset('storage/' . $item['image'])}}" alt="" class="group-hover:rounded-2xl transition-all duration-200">
                    <div class="py-5 px-3 w-full">
                        <div class="flex justify-between items-center mb-3 gap-2">
                            <h1 class="text-lg font-semibold tracking-normal truncate group-hover:text-sky-800 transition-all duration-200">{{$item->title}}</h1>
                            <span class="ring-1 ring-sekunder py-0.5 px-2 italic rounded-full text-sekunder bg-dasar text-xs group-hover:bg-emerald-400 group-hover:text-dasar transition-all duration-200 hover:ring-offset-2">Kategori</span>
                        </div>
                        <p class="line-clamp-4 tracking-tight text-sm">
                        {{$item->desc}}
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    {{-- kotak bantuan --}}
    <section class="py-16 px-5 md:px-10 lg:px-20">
        <div class="bg-sky-900 p-10 w-full text-dasar flex justify-center items-center flex-col text-center gap-y-3 rounded-xl">
            <p class="text-lg">Untuk informasi lebih lanjut, silahkan hubungi kami melalui tombol dibawah ini.</p>
            <a href="https://api.whatsapp.com/send?phone={{ App\Models\General::first()->school_phone }}&text=Assalamu%20Alaikum%20Admin." target="_blank" 
            class="bg-sekunder py-2 px-7 font-bold uppercase tracking-wider rounded-full shadow-lg hover:bg-sekunder/50 duration-200"
            >Hubungi kami</a>
        </div>
    </section>
    
    <!--Footer container-->
    <footer class="w-full bg-primer text-center text-white">
        <div class="px-6">
            <div class="w-5/12 mx-auto flex justify-center items-center bg-dasar py-6 rounded-t-full">
                <!-- facebook -->
                <a
                href="#!"
                type="button"
                class="m-1 h-9 w-9 rounded-full border-2 border-sekunder uppercase leading-normal text-sekunder transition duration-150 ease-in-out hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0"
                data-te-ripple-init
                data-te-ripple-color="light">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="mx-auto h-full w-4"
                    fill="currentColor"
                    viewBox="0 0 24 24">
                    <path
                    d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                </svg>
                </a>
        
                <!-- twitter -->
                <a
                href="#!"
                type="button"
                class="m-1 h-9 w-9 rounded-full border-2 border-sekunder uppercase leading-normal text-sekunder transition duration-150 ease-in-out hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0"
                data-te-ripple-init
                data-te-ripple-color="light">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="mx-auto h-full w-4"
                    fill="currentColor"
                    viewBox="0 0 24 24">
                    <path
                    d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                </svg>
                </a>
        
                <!-- google -->
                <a
                href="#!"
                type="button"
                class="m-1 h-9 w-9 rounded-full border-2 border-sekunder uppercase leading-normal text-sekunder transition duration-150 ease-in-out hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0"
                data-te-ripple-init
                data-te-ripple-color="light">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="mx-auto h-full w-4"
                    fill="currentColor"
                    viewBox="0 0 24 24">
                    <path
                    d="M7 11v2.4h3.97c-.16 1.029-1.2 3.02-3.97 3.02-2.39 0-4.34-1.979-4.34-4.42 0-2.44 1.95-4.42 4.34-4.42 1.36 0 2.27.58 2.79 1.08l1.9-1.83c-1.22-1.14-2.8-1.83-4.69-1.83-3.87 0-7 3.13-7 7s3.13 7 7 7c4.04 0 6.721-2.84 6.721-6.84 0-.46-.051-.81-.111-1.16h-6.61zm0 0 17 2h-3v3h-2v-3h-3v-2h3v-3h2v3h3v2z"
                    fill-rule="evenodd"
                    clip-rule="evenodd" />
                </svg>
                </a>

                <a href="{{ route('front') }}" class="w-20 mx-8">
                    <img src="/dists/images/logo_only_currentColor.svg">
                </a>
        
                <!-- isntagram -->
                <a
                href="#!"
                type="button"
                class="m-1 h-9 w-9 rounded-full border-2 border-sekunder uppercase leading-normal text-sekunder transition duration-150 ease-in-out hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0"
                data-te-ripple-init
                data-te-ripple-color="light">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="mx-auto h-full w-4"
                    fill="currentColor"
                    viewBox="0 0 24 24">
                    <path
                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                </svg>
                </a>
        
                <!-- linkedin -->
                <a
                href="#!"
                type="button"
                class="m-1 h-9 w-9 rounded-full border-2 border-sekunder uppercase leading-normal text-sekunder transition duration-150 ease-in-out hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0"
                data-te-ripple-init
                data-te-ripple-color="light">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="mx-auto h-full w-4"
                    fill="currentColor"
                    viewBox="0 0 24 24">
                    <path
                    d="M4.98 3.5c0 1.381-1.11 2.5-2.48 2.5s-2.48-1.119-2.48-2.5c0-1.38 1.11-2.5 2.48-2.5s2.48 1.12 2.48 2.5zm.02 4.5h-5v16h5v-16zm7.982 0h-4.968v16h4.969v-8.399c0-4.67 6.029-5.052 6.029 0v8.399h4.988v-10.131c0-7.88-8.922-7.593-11.018-3.714v-2.155z" />
                </svg>
                </a>
        
                <!-- github -->
                <a
                href="#!"
                type="button"
                class="m-1 h-9 w-9 rounded-full border-2 border-sekunder uppercase leading-normal text-sekunder transition duration-150 ease-in-out hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0"
                data-te-ripple-init
                data-te-ripple-color="light">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="mx-auto h-full w-4"
                    fill="currentColor"
                    viewBox="0 0 24 24">
                    <path
                    d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                </svg>
                </a>
            </div>
        </div>
    
        <!--Copyright section-->
        <div
            class="p-4 text-center text-xs bg-black/50">
            © 2023 - 
            <a class="text-white tracking-wide" href="https://tailwind-elements.com/"
                >Sekolah Ar-Romusha</a
            >
        </div>
    </footer>
</main>
@endsection