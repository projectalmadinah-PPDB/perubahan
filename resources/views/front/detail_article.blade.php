@extends('front.layouts.parent')

@section('title',$articles->title)

@section('content')
<main class="w-full pt-14">
    <section id="breadcrumb" class="w-full pt-10 px-10 md:px-40 text-lg">
        <a href="{{ route('informasi') }}" class="text-sky-900 hover:text-sky-600 duration-200 font-bold">&ctdot; Informasi</a> &raquo; {{ $articles->title }}
    </section>
    <!-- hero section -->
    <div class="pt-10 px-4 sm:px-16 md:px-32">
        <section 
            class="w-full rounded-xl h-[20rem] bg-primer bg-cover bg-center shadow-md flex flex-col justify-end items-end gap-y-4 text-center text-white"
            style="background-image: url('{{ asset('storage/' . $articles['image'])}}');">
            <h1 
                class="text-lg font-bold mb-0 leading-none p-4 flex items-center gap-x-2">
                <img src="/dists/images/logo_only_white.svg" alt="" class="w-7">
                Sekolah {{ App\Models\General::first()->school_name }}.
            </h1>
        </section>
    </div>

    <!-- artikel -->
    <section class="w-full px-7 md:px-40 pt-10 pb-6">
        <article class="prose prose-sm md:prose-lg prose-slate !max-w-[90ch]">
            <h1 class="!mb-4 title">{{$articles->title}}</h1>
            <div class="flex justify-start items-center gap-x-2">
                <a href="" class="no-underline ring-1 ring-sekunder py-1 px-3 italic rounded-full text-sekunder bg-dasar text-xs transition-all duration-200 hover:ring-offset-2"
                        >Kategori</a>
                <span class="ring-1 ring-sekunder bg-dasar py-1 px-3 text-xs font-semibold rounded-md">
                    Date : <span class="font-medium">{{ $articles->created_at->format('H:i, d M Y') }}</span>
                </span>
            </div>
            <p>
                {!! $articles->desc !!}
            </p>
        </article>
    </section>

    <!-- list article -->
    <section class="w-full pt-20 pb-16 px:10 md:px-20 flex flex-col justify-start items-center">
        <a href="{{ route('informasi') }}"
            class="inline-flex items-center rounded-[3rem] bg-emerald-200 px-2 py-1 text-xs font-medium text-emerald-700 ring-1 ring-inset ring-emerald-700 mb-3"
        >B.L.O.G</a>
        <h1 class="text-3xl font-bold title">Artikel Terbaru.</h1>
        <p class="mt-2 mb-14 text-sm text-gray-700 tracking-wide">
            Baca beragam artikel dengan kategori yang berkaitan dengan artikel ini.
        </p>
        <div class="flex justify-start items-start flex-wrap w-full gap-4 relative pb-10">
            <!-- if -->
            <a href="{{ route('informasi') }}" class="absolute bottom-2 left-1/2 -translate-x-1/2 bg-sekunder ring-2 ring-sekunder ring-offset-2 hover:ring-offset-4 py-2 px-4 text-sm duration-200 hover:bg-emerald-600 text-dasar font-semibold tracking-wide rounded-md">Lihat Lebih Banyak</a>
            <!-- endif -->
            
            @foreach ($article->where('category_id', $articles->category_id)->take(10) as $item)
            @if ($item->slug !== $articles->slug)
            <a href="{{route('user.informasi.detail',$item->slug)}}" class="group w-[19rem] ring-1 ring-sekunder flex flex-col items-center justify-start hover:rounded-2xl hover:bg-slate-50 transition-all duration-200 hover:ring-offset-4">
                <img src="{{ asset('storage/' . $item['image'])}}" alt="" class="group-hover:rounded-2xl transition-all duration-200">
                <div class="py-5 px-3 w-full">
                    <div class="flex justify-between items-center mb-3 gap-2">
                        <h1 class="text-lg font-semibold tracking-normal truncate group-hover:text-sky-800 transition-all duration-200">{{$item->title}}</h1>
                        <span class="ring-1 ring-sekunder py-0.5 px-2 italic rounded-full text-sekunder bg-dasar text-xs group-hover:bg-emerald-400 group-hover:text-dasar transition-all duration-200 hover:ring-offset-2">Kategori</span>
                    </div>
                    <p class="line-clamp-4 tracking-tight text-sm">
                       {!! $item->desc !!}
                    </p>
                </div>
            </a>
            @endif
            @endforeach
        </div>
    </section>
</main>
@endsection