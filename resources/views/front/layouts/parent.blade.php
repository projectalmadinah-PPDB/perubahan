<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ar-Romusha | @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('/dists/assets/style.css') }}">
    @include('front.layouts.include')
    @vite(['resources/css/real.css'])
</head>
<body>
    @include('front.layouts.header')
    <div class="bg-dasar w-full min-h-[75vh] h-auto font-poppins caret-sekunder accent-primer">
        @yield('content')
        @include('front.layouts.contact')
    </div>
    @include('front.layouts.footer')
    @include('front.layouts.script')
    @stack('my-script')
</body>
</html>