<header class="z-[1000] w-full bg-primer flex items-center justify-between px-7 select-none">
    <a href="{{ route('front') }}"
        class="p-2 flex gap-2 items-center group">
        <img id="logo" class="h-7 md:h-8" src="/dists/images/logo_only_white.svg">
        <span class="font-extrabold uppercase text-xl hidden sm:block text-dasar group-hover:text-sekunder">{{ App\Models\General::first()->school_name }}</span>
    </a>

    {{-- pc navigator --}}
    <nav class="hidden md:flex items-center justify-center">
        <a href="{{ route('user.dashboard') }}" 
            class="{{ Route::is('user.dashboard') ? 'font-semibold' : '' }} group/nav px-4 py-5 text-dasar text-center text-sm tracking-wider relative duration-200">
            Dashboard
            <div class="{{ Route::is('user.dashboard') ? 'w-8' : 'w-0' }} duration-200 group-hover/nav:w-10 h-[.15rem] bg-sekunder rounded-full absolute bottom-4 left-1/2 right-1/2 -translate-x-1/2"></div>
        </a>
        <a href="{{ route('user.profile') }}" 
            class="{{ Route::is('user.profile') ? 'font-semibold' : '' }} group/nav px-4 py-5 text-dasar text-center text-sm tracking-wider relative duration-200">
            Profil
            <div class="{{ Route::is('user.profile') ? 'w-8' : 'w-0' }} duration-200 group-hover/nav:w-10 h-[.15rem] bg-sekunder rounded-full absolute bottom-4 left-1/2 right-1/2 -translate-x-1/2"></div>
        </a>
        <a href="{{ route('user.informasi') }}" 
            class="{{ Route::is('user.informasi') || Route::is('user.informasi.detail') ? 'font-semibold' : '' }} group/nav px-4 py-5 text-dasar text-center text-sm tracking-wider relative duration-200">
            Informasi
            <div class="{{ Route::is('user.informasi') || Route::is('user.informasi.detail') ? 'w-8' : 'w-0' }} duration-200 group-hover/nav:w-10 h-[.15rem] bg-sekunder rounded-full absolute bottom-4 left-1/2 right-1/2 -translate-x-1/2"></div>
        </a>
        <a href="{{ route('user.qna') }}" 
            class="{{ Route::is('user.qna') ? 'font-semibold' : '' }} group/nav px-4 py-5 text-dasar text-center text-sm tracking-wider relative duration-200">
            Q&A
            <div class="{{ Route::is('user.qna') ? 'w-8' : 'w-0' }} duration-200 group-hover/nav:w-10 h-[.15rem] bg-sekunder rounded-full absolute bottom-4 left-1/2 right-1/2 -translate-x-1/2"></div>
        </a>

        <span class="px-2 py-1 ms-3 text-dasar text-center text-xl duration-200 hover:bg-sekunder rounded-full border border-sekunder group/account relative">
            <i class="bi bi-person"></i>
            <div class="hidden group-hover/account:block duration-200 absolute pt-4 top-8 right-0 min-w-52 w-52">
                <div class="w-full bg-dasar shadow-lg rounded-xl grid grid-cols-1 divide-y border border-sekunder">
                    <a href="{{ route('front') }}" class="select-none hover:text-sky-700 w-full block text-sm p-3 text-primer font-semibold">Home</a>
                    <span class="select-none w-full block text-sm p-3 text-primer font-semibold">{{ $user->name }}</span>
                    <a href="{{ route('user.logout') }}" class="w-full text-sm p-3 text-primer font-semibold hover:text-emerald-500 duration-200 flex items-center justify-center">
                        <i class="bi bi-box-arrow-left text-emerald-600 text-lg me-2"></i>
                        <span>Logout</span>
                    </a>
                    <a href="{{ route('user.change') }}" class="w-full text-sm p-3 text-primer font-semibold hover:text-emerald-500 duration-200 flex items-center justify-center">
                        Change Password
                    </a>
                </div>
            </div>
        </span>
    </nav>
    
    {{-- mobile navigator --}}
    <nav class="block md:hidden z-[1000]">
        <span class="text-dasar" id="menuBar" onclick="myMenu(this)">
            <div class="group/menubar hover:bg-emerald-500 rounded-full flex flex-col items-center justify-center gap-y-1 p-1 py-1.5 cursor-pointer">
                <div 
                    class="w-5 h-0.5 bg-dasar duration-200 group-hover/menubar:rotate-45 group-hover/menubar:translate-y-1.5"
                ></div>
                <div 
                    class="w-5 h-0.5 bg-dasar duration-200 group-hover/menubar:opacity-0"
                ></div>
                <div 
                    class="w-5 h-0.5 bg-dasar duration-200 group-hover/menubar:-rotate-45 group-hover/menubar:-translate-y-1.5"
                ></div>
            </div>
        </span>

        <span id="navMenuMobile" class="w-0 duration-200 absolute top-[2.75rem] right-0 h-screen bg-sky-950 grid grid-cols-1 divide-y-2">
            <div class="flex flex-col">
                    <a href="{{ route('user.dashboard') }}" 
                    class="{{ Route::is('user.dashboard') ? 'font-semibold text-xl' : '' }} group/nav w-full px-7 py-4 text-dasar text-start tracking-wider relative duration-200 hover:bg-sky-900">
                    Dashboard
                </a>
                <a href="{{ route('user.profile') }}" 
                class="{{ Route::is('user.profile') ? 'font-semibold text-xl' : '' }} group/nav w-full px-7 py-4 text-dasar text-start tracking-wider relative duration-200 hover:bg-sky-900">
                Profil
                </a>
                <a href="{{ route('user.informasi') }}" 
                    class="{{ Route::is('user.informasi') || Route::is('user.informasi.detail') ? 'font-semibold text-xl' : '' }} group/nav w-full px-7 py-4 text-dasar text-start tracking-wider relative duration-200 hover:bg-sky-900">
                    Informasi
                </a>
                <a href="{{ route('user.qna') }}"  
                    class="{{ Route::is('user.qna') ? 'font-semibold text-xl' : '' }} group/nav w-full px-7 py-4 text-dasar text-start tracking-wider relative duration-200 hover:bg-sky-900">
                    Q&A
                </a>
            </div>
            <div class="flex flex-col w-full border-t-sky-700">
                <span class="px-7 py-3 text-sky-400 select-none">{{ $user->name }}</span>
                <a href="{{ route('user.logout') }}" class="w-full px-7 py-0 text-sm text-sky-400 font-semibold hover:text-sky-200 duration-200 flex items-center justify-start">
                    <i class="bi bi-box-arrow-left text-sky-300 text-lg me-2"></i>
                    <span>Logout</span>
                </a>
            </div>
        </span>

        <script>
            function myMenu(event) {
                const menuBar = document.querySelectorAll('span#menuBar > div > div');

                // Tambahkan atau hapus class untuk animasi rotasi dan translasi
                menuBar[0].classList.toggle('rotate-45');
                menuBar[0].classList.toggle('translate-y-1.5');
                menuBar[1].classList.toggle('opacity-0');
                menuBar[2].classList.toggle('-rotate-45');
                menuBar[2].classList.toggle('-translate-y-1.5');

                // menu mobile
                const menuMobile = document.querySelector('#navMenuMobile');

                menuMobile.classList.toggle('w-0');
                menuMobile.classList.toggle('w-1/2');
            }
        </script>
    </nav>
</header>