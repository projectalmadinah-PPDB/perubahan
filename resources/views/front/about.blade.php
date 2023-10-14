@extends('front.layouts.parent')

@section('title','About Us')

@section('content')
<main class="w-full pt-14">
    <!-- about -->
    <section class="w-full px-7 md:px-20 pt-16 flex flex-col text-center justify-start items-center">
        <h1 class="text-4xl font-extrabold tracking-wide title mb-2">Tentang Kami.</h1>
        <p class="text-sm tracking-wide font-medium text-gray-400 mb-10">
            Ingin berkonsultasi dengan kami ?
        </p>
        <article class="prose !max-w-full pt-8 pb-20 px-20 md:px-36">
            <blockquote class="tracking-wider">
                {!! $general->desc !!}
            </blockquote>
        </article>
        <div class="flex flex-col md:flex-row justify-start md:justify-center items-center gap-10 tracking-wider">
            <div class="min-w-[21rem] h-fit py-5 px-7 ring-2 ring-sekunder ring-offset-2 hover:ring-offset-8  hover:rounded-3xl duration-200">
                <div class="flex items-center justify-center gap-x-3 mb-3">
                    
                    <h3 class="text-lg font-semibold">Email</h3>
                </div>
                <p class="tracking-wide text-slate-600">
                    {{ $general->school_email }}
                </p>
            </div>
            <div class="min-w-[21rem] h-fit py-5 px-7 ring-2 ring-sekunder ring-offset-2 hover:ring-offset-8 hover:rounded-3xl duration-200">
                <div class="flex items-center justify-center gap-x-3 mb-3">

                    <h3 class="text-lg font-semibold">Alamat</h3>
                </div>
                <p class="tracking-wide text-slate-600 text-sm">
                    {{ $general->school_address }}
                </p>
            </div>
            <div class="min-w-[21rem] h-fit py-5 px-7 ring-2 ring-sekunder ring-offset-2 hover:ring-offset-8  hover:rounded-3xl duration-200">
                <div class="flex items-center justify-center gap-x-3 mb-3">

                    <h3 class="text-lg font-semibold">Telepon</h3>
                </div>
                <p class="tracking-wide text-slate-600">
                    {{ $general->school_phone }}  
                </p>
            </div>
        </div>
    </section>
</main>
@endsection