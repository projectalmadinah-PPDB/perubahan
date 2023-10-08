@extends('pages.admin.layouts.parent')

@section('title','Login')

@section('content')
<!-- component -->
<div class="w-full min-h-screen bg-gray-50 flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
    <div class="w-full sm:max-w-md p-5 py-10 rounded-3xl select-none mx-auto shadow-lg">
      <a href="{{ route('front') }}" class="flex items-center justify-center">
        <img src="../dist/img/Vector.svg" class="items-center justify-center mb-12" >
      </a>
      <form action="{{route('admin.login')}}" method="POST">
        @csrf
        <div class="mb-4">
          <label class="block mb-1" for="email">Email</label>
          <input id="email" type="email" name="email" class="py-2 px-3 border border-gray-300 focus:border-sky-300 focus:outline-none focus:ring focus:ring-sky-200 focus:ring-opacity-50 rounded-xl shadow-sm disabled:bg-gray-100 mt-1 block w-full" />
          @error('email')
            <div class="flex items-center p-4 mb-4 text-sm text-sky-800 rounded-lg bg-sky-50" role="alert">
              <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
              </svg>
              <span class="sr-only">Info</span>
              <div>
              <span class="font-medium">{{$message}}
              </div>
          </div>
          @enderror
        </div>
        <div class="mb-4">
          <label class="block mb-1" for="password">Password</label>
          <input id="password" type="password" name="password" class="py-2 px-3 border border-gray-300 focus:border-sky-300 focus:outline-none focus:ring focus:ring-sky-200 focus:ring-opacity-50 rounded-xl shadow-sm disabled:bg-gray-100 mt-1 block w-full" />
          @error('password')
            <div class="flex items-center p-4 mb-4 text-sm text-sky-800 rounded-lg bg-sky-50" role="alert">
              <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
              </svg>
              <span class="sr-only">Info</span>
              <div>
              <span class="font-medium">{{$message}}
              </div>
          </div>
          @enderror
        </div>
        <div class="mt-6 flex items-center justify-end">
          {{-- <div class="flex items-center">
            <input id="remember_me" type="checkbox" class="border border-gray-300 text-sky-600 shadow-sm focus:border-sky-300 focus:ring focus:ring-sky-200 focus:ring-opacity-50" />
            <label for="remember_me" class="ml-2 block text-sm leading-5 text-gray-900"> Remember me </label>
          </div> --}}
          <a href="" class="text-sm"> Lupa Password? </a>
        </div>
        <div class="mt-6">
          <button class="w-full inline-flex items-center justify-center px-4 py-2 bg-sky-600 border border-transparent font-semibold capitalize text-white hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-700 focus:ring focus:ring-sky-200 disabled:opacity-25 transition rounded-xl shadow-sm hover:shadow-md" type="submit">Login</button>
        </div>
      </form>
    </div>
  </div>
  </section>
@endsection