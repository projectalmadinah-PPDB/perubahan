<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muhammad Farhan | @yield('title')</title>
    @include('front.layouts.include')
</head>
<body>
   
    @yield('content')

<!-- Back to top Start -->
    <a href="#home" id="to-top" class="hidden fixed bottom-4 right-4 z-[9999] justify-center items-center h-14 w-14 rounded-full bg-primary p-4 hover:animate-pulse">
        <span class="block h-5 w-5 border-t-2 border-l-2 rotate-45 mt-2"></span>
    </a>
<!-- Back to top End -->
    @include('front.layouts.script')
    @stack('my-script')
</body>
</html>