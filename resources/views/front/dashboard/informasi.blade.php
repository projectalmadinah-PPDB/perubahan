@extends('front.dashboard.layouts.parent')

@section('title','Informasi')

@section('content')
<main class="w-full min-h-screen h-auto bg-gradient-to-br from-dasar via-sky-50 to-sky-100">
    <span class="sr-only" id="listArticle">list artikel</span>
    <!-- list article -->
    <section class="w-full pt-14 pb-16 px:10 md:px-20 flex flex-col justify-start items-center">
        <span
            class="inline-flex items-center rounded-[3rem] bg-emerald-200 px-2 py-1 text-xs font-medium text-emerald-700 ring-1 ring-inset ring-emerald-700 mb-3"
        >Informasi</span>
        <h1 class="text-3xl font-bold title">Informasi Terbaru.</h1>
        <p class="mt-2 mb-14 text-sm text-gray-700 tracking-wide">
            Baca beragam artikel terkait Sekolah Ar-Romusha dibawah ini.
        </p>
        <div class="flex justify-start items-start flex-wrap w-full gap-4 relative pb-10">
            <!-- if -->
            <button class="absolute bottom-2 left-1/2 -translate-x-1/2 bg-sekunder ring-2 ring-sekunder ring-offset-2 hover:ring-offset-4 py-2 px-4 text-sm duration-200 text-dasar font-semibold tracking-wide">Lebih Banyak</button>
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

    <!-- kotak bantuan -->
    <section class="pt-5 pb-10 px-5 md:px-10 lg:px-60">
        <div class="bg-sky-900 p-10 w-full text-dasar flex justify-center items-center flex-col text-center gap-y-3 rounded-xl">
            <p class="3xl7g">Untuk informasi lebih lanjut, silahkan hubungi kami melalui tombol ini.
            <a href="https://api.whatsapp.com/send?phone={{ App\Models\General::first()->school_phone }}&text=Assalamu%20Alaikum%20Admin." target="_blank" 
            class="bg-sekunder ms-3 py-2 px-7 font-bold uppercase tracking-wider rounded-full shadow-lg hover:bg-sekunder/50 duration-200"
            >Hubungi kami</a>
        </div>
    </section>
</main>
@endsection