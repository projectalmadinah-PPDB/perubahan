<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css"  rel="stylesheet" />
    <title>Terimakasih</title>
    @vite(['resources/css/real.css'])
    @include('front.layouts.include')
    @stack('css')
</head>
<body>
    <div class="w-full h-auto bg-gradient-to-t from-dasar to-sky-100">
        <figure class="max-w-screen-md h-screen mx-auto text-center flex flex-col justify-center items-center bg-gradient-to-b from-dasar to-sky-100">
            <img class="w-80 h-80 mb-12" src="/dists/images/logo_only.svg" alt="image description">
            <svg class="w-10 h-10 mb-3 text-slate-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 14">
                <path d="M6 0H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3H2a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Zm10 0h-4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3h-1a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Z"/>
            </svg>
            <p class="text-2xl italic font-medium text-slate-900">
                "Pembayaran Berhasil<br>dilakukan!!<br>Terimakasih."
            </p>
            <figcaption class="flex items-center justify-center mt-6 space-x-3">
                <div class="flex items-center divide-x-2 divide-slate-500">
                    <a href="{{route('user.dashboard')}}" class="px-3 text-sm text-slate-500 hover:text-slate-800"
                    >Kembali ke <span class="font-semibold">DASHBOARD</span></a>
                    <a href="{{route('front')}}" class="px-3 text-sm text-slate-500 font-semibold hover:text-slate-800 uppercase">Home</a>
                </div>
            </figcaption>
        </figure>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    <script>
    if(session('success')){
        Swal.fire(
            '{{session('success')}}!',
            'You clicked the button!',
            'success'
            )
    }
    </script>
</body>
</html>