@extends('front.layouts.parent')

@section('title','Informasi')

@section('content')
<main class="w-full pt-14 pb-2">
    <!-- list article -->
    <section class="w-full pt-16 pb-10 px-10 md:px-20 flex flex-col justify-start items-center min-h-[50vh] h-auto">
        <span
            class="inline-flex items-center rounded-[3rem] bg-emerald-200 px-2 py-1 text-xs font-medium text-emerald-700 ring-1 ring-inset ring-emerald-700 mb-3"
        >I.N.F.O</span>
        <h1 class="text-3xl font-bold title">Artikel Terbaru.</h1>
        <p class="mt-2 mb-14 text-sm text-gray-700 tracking-wide">
            Baca beragam artikel terkait Sekolah Ar-Romusha dibawah ini.
        </p>
        <div class="flex justify-start items-start flex-wrap w-full gap-4 relative pb-10">
            @forelse ($article as $item)
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
            @empty
            <h5 class="w-full tracking-wide text-center list-decimal ps-5">
                ~ Maaf, tidak ada informasi yang bisa diberikan ~
            </h5>
            @endforelse
        </div>
    </section>
</main>
@endsection