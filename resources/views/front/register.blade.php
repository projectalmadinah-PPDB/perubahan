@extends('front.layouts.parent')

@section('title','User | Register')
@section('content')
<main class="w-full pt-14">
    <!-- formulir pendaftaran -->
    <section 
        class="w-full flex justify-center items-center pt-7">
        <div class="bg-gradient-to-t from-primer to-sky-900 flex flex-col justify-center items-center gap-y-3 px-5 md:px-16 py-16 rounded-3xl text-dasar">
            <h1 class="text-3xl font-semibold text-center title">Formulir Pendaftaran.</h1>
            <p class="text-sm tracking-wide font-light text-gray-400">
                Mohon isi formulir pendaftaran dengan lengkap dan benar.
            </p>
            <form class="mt-5 w-full" action="{{route('user.register.proses')}}" method="POST">
                @csrf
                @method('post')
                <div class="mb-3">
                    <label for="" class="text-sm">Nama Lengkap</label>
                    <input 
                        type="text" name="name"
                        placeholder="nama lengkap"
                        class="shadow-inner rounded-full w-full py-2 px-4 outline-none placeholder:opacity-100 focus:placeholder:opacity-0 placeholder:transition-all placeholder:duration-200 placeholder:italic text-sm placeholder:text-gray-500 bg-white/10 @error('name') appearance-none border border-red-500 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline
                        @enderror" value="{{old('name')}}"
                    >
                    @error('name')
                    <p class="text-red-500 text-xs italic">{{$message}}.</p>  
                    @enderror
                </div>
                <div class="flex justify-between gap-x-3">
                    <div class="mb-3 w-1/2">
                        <label for="" class="text-sm">Tanggal Lahir</label>
                        <input 
                            type="date" name="tanggal_lahir"
                            placeholder="62896XXXXXXXX"
                            class="shadow-inner rounded-full w-full py-2 px-4 outline-none placeholder:opacity-100 focus:placeholder:opacity-0 placeholder:transition-all placeholder:duration-200 placeholder:italic text-sm placeholder:text-gray-500 bg-white/10 @error('tanggal_lahir') appearance-none border border-red-500 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline
                            @enderror" value="{{old('tanggal_lahir')}}"
                        >
                        @error('tanggal_lahir')
                    <p class="text-red-500 text-xs italic">{{$message}}.</p>  
                    @enderror
                    </div>
                    <div class="mb-3 w-1/2">
                        <span class="text-sm">Jenis Kelamin</span>
                        <div class="flex justify-start items-center gap-x-5 py-1">
                            <div>
                                <input type="radio" name="jenis_kelamin" value="Laki-Laki" id="laki" class="accent-sekunder">
                                <label for="laki" class="text-sm">
                                    Laki - Laki
                                </label>
                                @error('jenis_kelamin')
                                <p class="text-red-500 text-xs italic">{{$message}}.</p>  
                                @enderror
                            </div>
                            <div>
                                <input type="radio" name="jenis_kelamin" value="Perempuan" id="perempuan" class="accent-sekunder">
                                <label for="perempuan" class="text-sm">
                                    Perempuan
                                </label>
                                @error('jenis_kelamin')
                                <p class="text-red-500 text-xs italic">{{$message}}.</p>  
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="" class="text-sm">Nomor Handphone</label>
                    <input 
                        type="tel" name="nomor"
                        placeholder="62896XXXXXXXX"
                        class="shadow-inner rounded-full w-full py-2 px-4 outline-none placeholder:opacity-100 focus:placeholder:opacity-0 placeholder:transition-all placeholder:duration-200 placeholder:italic text-sm placeholder:text-gray-500 bg-white/10 @error('nomor') appearance-none border border-red-500 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline
                        @enderror" value="{{old('nomor')}}"
                    >
                    @error('nomor')
                    <p class="text-red-500 text-xs italic">{{$message}}.</p>  
                    @enderror
                </div>
                <div class="flex justify-between gap-x-3 mb-3">
                    <div class="mb-3 w-1/2">
                        <label for="" class="text-sm">Password</label>
                        <span class="text-xs block text-slate-500 mb-1">Password minimal 8 - 12 karakter</span>
                        <input 
                            type="password" name="password"
                            placeholder="••••••••"
                            class="shadow-inner rounded-full w-full py-2 px-4 outline-none placeholder:opacity-100 focus:placeholder:opacity-0 placeholder:transition-all placeholder:duration-200 placeholder:italic text-sm placeholder:text-gray-500 bg-white/10 @error('password') appearance-none border border-red-500 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline
                            @enderror" value="{{old('password')}}"
                        >
                        @error('password')
                        <p class="text-red-500 text-xs italic">{{$message}}.</p>  
                        @enderror
                    </div>
                    <div class="mb-3 w-1/2">
                        <label for="" class="text-sm">Konfirmasi Password</label>
                        <span class="text-xs block text-slate-500 mb-1">Password minimal 8 - 12 karakter</span>
                        <input 
                            type="password" name="password_again"
                            placeholder="••••••••"
                            class="shadow-inner rounded-full w-full py-2 px-4 outline-none placeholder:opacity-100 focus:placeholder:opacity-0 placeholder:transition-all placeholder:duration-200 placeholder:italic text-sm placeholder:text-gray-500 bg-white/10 @error('password_again') appearance-none border border-red-500 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline
                            @enderror" value="{{old('password_again')}}"
                        >
                        @error('password_again')
                        <p class="text-red-500 text-xs italic">{{$message}}.</p>  
                        @enderror
                    </div>
                </div>
                <button type="submit" 
                    class="w-full py-2 px-4 border-2 rounded-full font-semibold tracking-wider border-sekunder bg-sekunder hover:bg-sekunder/50 duration-200 ease-in-out">
                    Daftar
                </button>
            </form>
        </div>
    </section>
</main>
@endsection