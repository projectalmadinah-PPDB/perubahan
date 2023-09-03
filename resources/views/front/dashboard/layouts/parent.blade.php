<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muhammad Farhan | @yield('title')</title>
    @include('front.layouts.include')
    @vite(['resources/css/real.css'])
</head>
<body>
    <div class="bg-gradient-to-br from-dasar via-sky-50 to-sky-200 w-full h-auto font-poppins caret-sekunder accent-primer">
        @include('front.dashboard.layouts.header')
        <div class="bg-dasar w-full h-screen font-poppins caret-sekunder accent-primer">
            @yield('content')
        </div>
        {{-- @include('front.layouts.footer') --}}
        @include('front.dashboard.layouts.script')
        @stack('my-script')
    </div>
</body>
</html>