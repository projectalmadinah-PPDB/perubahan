        <!-- navbar -->
{{-- @if (!Route::is('user.index') && !Route::is('user.activication'))
        <nav 
        class="font-poppins z-[1000] w-full bg-white backdrop-blur-md px-5 sm:px-7 md:px-10 border-b border-sekunder/20 fixed flex justify-between items-center">
        <!-- logo -->
        <a href="{{ route('front') }}"
            class="p-2 flex gap-2 items-center">
            <img id="logo" class="h-8 md:h-9" src="/dists/images/logo_only.svg">
            <span class="font-extrabold text-xl hidden sm:block text-primer uppercase">{{ App\Models\General::first()->school_name }}</span>
        </a>

        <!-- pc menu -->
        <div 
            class="hidden md:block">
            <a href="{{route('front')}}" 
                class="text-sm p-2 {{Route::is('front') ? 'nav-active' : '' }}"
            >Home</a>
            @if (!Auth::user())
            <a href="{{route('user.show')}}" 
            class="text-sm p-2 {{Route::is('user.show') ? 'nav-active' : '' }}"
            >Daftar</a>
            @endif
            <a href="{{route('informasi')}}" 
                class="text-sm p-2 {{Route::is('informasi') || Route::is('user.informasi.detail') ? 'nav-active' : '' }}"
            >Informasi</a>
            <a href="{{route('about')}}" 
                class="text-sm p-2 {{Route::is('about') ? 'nav-active' : '' }}"
            >About</a>
            <a href="{{route('qna')}}" 
                class="text-sm p-2 {{Route::is('qna') ? 'nav-active' : '' }}"
            >Q&A</a>
            @if (!Auth::user())
            <a href="{{route('user.index')}}" 
            class="text-sm p-2 border-[1.5px] border-sekunder text-sekunder font-semibold ms-3 hover:bg-sekunder hover:text-white duration-200"
            >Login</a>
            @else
            <a href="{{route('user.dashboard')}}" 
            class="text-sm p-2 border-[1.5px] border-sekunder text-sekunder font-semibold ms-3 hover:bg-sekunder hover:text-white duration-200"
            >Dashboard</a>
            @endif
        </div>
        <!-- mobile menu button -->
        <label class="md:hidden pointer-events-auto" for="swapHamburger">
            <input type="checkbox" id="swapHamburger" class="hidden">
            <!-- hamburger -->
            <div id="openMenu" class=" 
            flex flex-col justify-center items-center gap-y-1 p-[.5rem] py-[.8rem] bg-emerald-300 hover:bg-emerald-500 duration-200 rounded-full">
                <div class="w-6 h-[2px] bg-white rounded-full"></div>
                <div class="w-6 h-[2px] bg-white rounded-full"></div>
                <div class="w-6 h-[2px] bg-white rounded-full"></div>
            </div>
            
            <!-- x-hamburger -->
            <!-- <div id="closeMenu" class="hidden 
            flex flex-col justify-center items-center gap-y-1 p-[.5rem] py-[1rem] bg-emerald-300 hover:bg-emerald-500 duration-200 rounded-full">
                <div class="w-6 h-[2px] bg-white rounded-full rotate-45 translate-y-[.25rem]"></div>
                <div class="w-6 h-[2px] bg-white rounded-full -rotate-45 -translate-y-[.125rem]"></div>
                <div class="w-6 h-[2px] bg-white rounded-full hidden"></div>
            </div> -->

            <!-- hamburger toggle -->
            <script type="text/javascript">
                var btnMenu = document.getElementById("swapHamburger");
                var mobileMenu = document.getElementById("mobileMenu");
                var openMenu = document.getElementById("openMenu");
                var closeMenu = document.getElementById("closeMenu");

                btnMenu.addEventListener("click", function() {
                    mobileMenu.classList.toggle('hidden');
                    openMenu.classList.toggle('hidden');
                    closeMenu.classList.toggle('hidden');
                });

            </script>
        </label>
    </nav>
@endif --}}
@if (!Route::is('user.index') && !Route::is('user.activication'))
<header class="font-poppins z-[1000] w-full bg-dasar py-1.5 md:py-0 shadow-md fixed flex items-center justify-between px-7 select-none">
    <a href="{{ route('front') }}"
        class="p-2 flex gap-2 items-center group">
        <img id="logo" class="h-7 md:h-8" src="/dists/images/logo_only.svg">
        <span class="font-extrabold uppercase text-xl hidden sm:block text-primer group-hover:text-sekunder">{{ App\Models\General::first()->school_name }}</span>
    </a>

    {{-- pc navigator --}}
    <nav class="hidden md:flex items-center justify-center">
        <a href="{{ route('front') }}" 
            class="{{ Route::is('front') ? 'font-semibold' : '' }} group/nav px-4 py-5 text-primer text-center text-sm tracking-wider relative duration-200">
            Home
            <div class="{{ Route::is('front') ? 'w-8' : 'w-0' }} duration-200 group-hover/nav:w-10 h-[.15rem] bg-sekunder rounded-full absolute bottom-4 left-1/2 right-1/2 -translate-x-1/2"></div>
        </a>
        <a href="{{ route('user.show') }}" 
            class="{{ Route::is('user.show') ? 'font-semibold' : '' }} group/nav px-4 py-5 text-primer text-center text-sm tracking-wider relative duration-200">
            Daftar
            <div class="{{ Route::is('user.show') ? 'w-8' : 'w-0' }} duration-200 group-hover/nav:w-10 h-[.15rem] bg-sekunder rounded-full absolute bottom-4 left-1/2 right-1/2 -translate-x-1/2"></div>
        </a>
        <a href="{{ route('informasi') }}" 
            class="{{ Route::is('informasi') || Route::is('user.informasi.detail') ? 'font-semibold' : '' }} group/nav px-4 py-5 text-primer text-center text-sm tracking-wider relative duration-200">
            Informasi
            <div class="{{ Route::is('informasi') || Route::is('user.informasi.detail') ? 'w-8' : 'w-0' }} duration-200 group-hover/nav:w-10 h-[.15rem] bg-sekunder rounded-full absolute bottom-4 left-1/2 right-1/2 -translate-x-1/2"></div>
        </a>
        <a href="{{ route('about') }}" 
            class="{{ Route::is('about') ? 'font-semibold' : '' }} group/nav px-4 py-5 text-primer text-center text-sm tracking-wider relative duration-200">
            About
            <div class="{{ Route::is('about') ? 'w-8' : 'w-0' }} duration-200 group-hover/nav:w-10 h-[.15rem] bg-sekunder rounded-full absolute bottom-4 left-1/2 right-1/2 -translate-x-1/2"></div>
        </a>
        <a href="{{ route('qna') }}" 
            class="{{ Route::is('qna') ? 'font-semibold' : '' }} group/nav px-4 py-5 text-primer text-center text-sm tracking-wider relative duration-200">
            Q&A
            <div class="{{ Route::is('qna') ? 'w-8' : 'w-0' }} duration-200 group-hover/nav:w-10 h-[.15rem] bg-sekunder rounded-full absolute bottom-4 left-1/2 right-1/2 -translate-x-1/2"></div>
        </a>

        @if (Auth::user())
            <span class="px-2 py-1 ms-3 text-primer text-center duration-200 hover:bg-sekunder rounded-full border border-sekunder group/account relative">
                <i class="bi bi-person text-xl"></i>
                <div class="hidden group-hover/account:block duration-200 absolute pt-4 top-8 right-0 min-w-52 w-52">
                    <div class="w-full bg-dasar shadow-lg rounded-xl grid grid-cols-1 divide-y border border-sekunder">
                        @if (Auth::user()->role == 'admin')
                        <a href="{{ route('admin.admin.dashboard') }}" class="select-none w-full block text-sm p-3 text-primer font-semibold hover:text-sky-700 duration-200">Dashboard</a>
                        @else
                        <a href="{{ route('user.dashboard') }}" class="select-none w-full block text-sm p-3 text-primer font-semibold hover:text-sky-700 duration-200">Dashboard</a>
                        @endif
                        <span class="select-none w-full block text-sm p-3 text-primer font-medium">{{ $user->name }}</span>
                        <a href="{{ route('user.logout') }}" class="w-full text-sm p-3 text-primer font-semibold hover:text-emerald-500 duration-200 flex items-center justify-center">
                            <i class="bi bi-box-arrow-left text-emerald-600 text-lg me-2"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </div>
            </span>
        @else
            <a href="{{ route('user.index') }}" class="font-medium tracking-wider px-2 py-1 ms-3 text-primer text-center text-sm duration-200 hover:bg-sekunder hover:text-dasar rounded-md border border-sekunder">Login</a>
        @endif
    </nav>
    
    {{-- mobile navigator --}}
    <nav class="block md:hidden z-[1000]">
        <span class="text-primer" id="menuBar" onclick="myMenu(this)">
            <div class="group/menubar hover:bg-emerald-500 rounded-md flex flex-col items-center justify-center gap-y-1 p-1 py-2 cursor-pointer">
                <div 
                    class="w-5 h-0.5 bg-primer duration-200 group-hover/menubar:rotate-45 group-hover/menubar:translate-y-1.5"
                ></div>
                <div 
                    class="w-5 h-0.5 bg-primer duration-200 group-hover/menubar:opacity-0"
                ></div>
                <div 
                    class="w-5 h-0.5 bg-primer duration-200 group-hover/menubar:-rotate-45 group-hover/menubar:-translate-y-1.5"
                ></div>
            </div>
        </span>

        <span id="navMenuMobile" class="w-0 duration-200 absolute top-[2.75rem] right-0 h-screen bg-gradient-to-br from-dasar to-sky-50 grid grid-cols-1 divide-y-2 shadow-lg">
            <div class="flex flex-col">
                <a href="{{ route('front') }}" 
                    class="{{ Route::is('front') ? 'font-semibold text-xl' : '' }} group/nav w-full px-7 py-4 text-primer text-start tracking-wider relative duration-200 hover:bg-sky-100">
                    Home
                </a>
                <a href="{{ route('user.show') }}" 
                    class="{{ Route::is('user.show') ? 'font-semibold text-xl' : '' }} group/nav w-full px-7 py-4 text-primer text-start tracking-wider relative duration-200 hover:bg-sky-100">
                    Daftar
                </a>
                <a href="{{ route('informasi') }}" 
                    class="{{ Route::is('informasi') || Route::is('user.informasi.detail') ? 'font-semibold text-xl' : '' }} group/nav w-full px-7 py-4 text-primer text-start tracking-wider relative duration-200 hover:bg-sky-100">
                    Informasi
                </a>
                <a href="{{ route('about') }}"  
                    class="{{ Route::is('about') ? 'font-semibold text-xl' : '' }} group/nav w-full px-7 py-4 text-primer text-start tracking-wider relative duration-200 hover:bg-sky-100">
                    About
                </a>
                <a href="{{ route('qna') }}"  
                    class="{{ Route::is('qna') ? 'font-semibold text-xl' : '' }} group/nav w-full px-7 py-4 text-primer text-start tracking-wider relative duration-200 hover:bg-sky-100">
                    Q&A
                </a>
            </div>
            <div class="flex flex-col w-full border-t-sky-700">
                @if (Auth::user())
                    @if (Auth::user()->role == 'admin')
                    <a href="{{ route('admin.admin.dashboard') }}" class="px-7 pt-3 text-sky-950 hover:text-sky-700 select-none">Dashboard</a>
                    @else
                    <a href="{{ route('user.dashboard') }}" class="px-7 pt-3 text-sky-950 hover:text-sky-700 select-none">Dashboard</a>
                    @endif
                    <span class="px-7 pt-3 text-sky-950 select-none">{{ $user->name }}</span>
                    <a href="{{ route('user.logout') }}" class="w-full px-7 pt-3 text-sm text-sky-950 font-semibold hover:text-sky-700 duration-200 flex items-center justify-start">
                        <i class="bi bi-box-arrow-left text-sky-900 text-lg me-2"></i>
                        <span>Logout</span>
                    </a>
                @else
                    <a href="{{ route('user.index') }}" class="px-7 pt-3 text-sky-950 hover:text-sky-700 select-none">Login</a>
                @endif
            </div>

        </span>

        <script>
            function myMenu(event) {
                const menuBar = document.querySelectorAll('span#menuBar > div > div');

                // Tambahkan atau hapus class untuk animasi rotasi dan translasi
                menuBar[0].classList.toggle('rotate-45'); menuBar[0].classList.toggle('translate-y-1.5');
                menuBar[1].classList.toggle('opacity-0');
                menuBar[2].classList.toggle('-rotate-45'); menuBar[2].classList.toggle('-translate-y-1.5');

                // menu mobile
                const menuMobile = document.querySelector('#navMenuMobile');

                menuMobile.classList.toggle('w-0'); menuMobile.classList.toggle('w-1/2');
            }
        </script>
    </nav>
</header>
@endif