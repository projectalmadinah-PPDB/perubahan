@extends('front.layouts.parent')

@section('title','User | Login')

@section('content')
  <div class="bg-gradient-to-br from-dasar via-sky-50 to-sky-200 w-full h-auto font-poppins caret-sekunder accent-primer">
    <img src="/dists/images/logo_only_currentColor.svg" draggable="false" class="fixed w-[70rem] opacity-20 -bottom-52">
    <main class="w-full h-screen flex justify-center items-center">
        <!-- formulir pendaftaran -->
        <section 
            class="relative w-full flex justify-center items-center py-7">
            <div class="bg-gradient-to-t from-primer to-sky-900 flex flex-col justify-center items-center gap-y-3 px-10 md:px-16 py-16 rounded-3xl text-dasar">
                <a href="{{ route('front') }}" title="Back to Home" class="py-[16px] px-[14px] rounded-full absolute z-999 top-0 bg-dasar shadow-2xl">
                    <img src="/dists/images/logo_only.svg" alt="" class="w-10">
                </a>
                <h1 class="text-4xl font-bold text-center leading-none">Login.</h1>
                @if(session('success'))
                <p class="text-sm tracking-wide font-light text-gray-400">
                  {{session('success')}}
                </p>
                @else
                <p class="text-sm tracking-wide font-light text-gray-400">
                  Selamat Datang Peserta
                </p>
                @endif
                <form class="mt-4 w-full" action="{{route('user.login')}}" method="post">
                  @csrf
                  @method('POST')
                    <div class="mb-3">
                        <label for="" class="text-sm">Nomor Handphone</label>
                        <input 
                            type="tel" name="nomor"
                            placeholder="62896XXXXXXXX"
                            class="shadow-inner rounded-full w-full py-2 px-4 outline-none placeholder:opacity-100 focus:placeholder:opacity-0 placeholder:transition-all placeholder:duration-200 placeholder:italic text-sm placeholder:text-gray-500 bg-white/10 @error('nomor')
                            shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline
                            @enderror"
                        >
                        @error('nomor')
                        <p class="text-red-500 text-xs italic">{{$message}}.</p>  
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="text-sm">Password</label>
                        <input 
                            type="password" name="password"
                            placeholder="••••••••"
                            class="shadow-inner rounded-full w-full py-2 px-4 outline-none placeholder:opacity-100 focus:placeholder:opacity-0 placeholder:transition-all placeholder:duration-200 placeholder:italic text-sm placeholder:text-gray-500 bg-white/10 @error('password')
                            shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline
                            @enderror"
                        >
                        @error('password')
                        <p class="text-red-500 text-xs italic">{{$message}}.</p>  
                        @enderror
                    </div>
                    <div class="mb-6 flex justify-between items-center">
                        <a href="{{route('user.show')}}" class="text-sm text-slate-400 hover:text-sky-300 duration-150">Belum daftar?</a>
                        <a href="" class="text-sm text-slate-400 hover:text-sky-300 duration-150">Lupa Password?</a>
                    </div>
                    <button type="submit" 
                        class="w-full py-2 px-4 border-2 rounded-full font-semibold tracking-wider border-sekunder bg-sekunder hover:bg-sekunder/50 duration-200 ease-in-out">
                        Masuk
                    </button>
                </form>
            </div>
        </section>

        <footer
            class="py-4 text-center text-xs bg-slate-900 fixed bottom-0 w-full text-dasar">
            © 2023 - 
            <a class="tracking-wide" href="https://tailwind-elements.com/"
                >Sekolah Ar-Romusha</a
            >
        </footer>
    </main>
</div>
@endsection