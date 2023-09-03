<nav 
        class="z-[1000] w-full bg-primer backdrop-blur-md px-5 sm:px-7 md:px-10 md:border-b md:border-sekunder/20 fixed flex justify-between items-center">
            <!-- logo -->
            <a href="index.html"
                class="p-2 flex gap-2 items-center">
                <img id="logo" class="h-8 md:h-9" src="/dists/images/logo_only_white.svg">
                <span class="font-extrabold text-xl hidden sm:block text-primer">AR-ROMUSHA</span>
            </a>

            <div class="flex justify-end items-center gap-x-2">
                <a href="{{route('user.logout')}}" 
                    class="text-sm p-2 tracking-wide border-[1.5px] border-larangan text-larangan font-semibold ms-3 hover:bg-larangan hover:text-white duration-200"
                >Logout</a>
                <div role="button" class="group md:hidden flex flex-col justify-center items-center gap-y-1 cursor-pointer py-2 px-4 border border-dasar duration-200 hover:bg-dasar rounded-full hover:-rotate-90" id="barMobile">
                    <div class="w-1 h-1 rounded-full bg-dasar group-hover:bg-primer"></div>
                    <div class="w-1 h-1 rounded-full bg-dasar group-hover:bg-primer"></div>
                    <div class="w-1 h-1 rounded-full bg-dasar group-hover:bg-primer"></div>
                </div>
            </div>
        </nav>
        <nav id="navMobile" 
            class="w-full md:px-10 md:py-3 bg-sekunder md:fixed top-[49px] md:top-[53px] relative hidden md:block z-[999]">
            <div
                class="fixed w-full h-screen md:h-auto bg-sekunder md:bg-transparent md:relative flex flex-col items-end justify-start md:block">
                <a href="{{route('user.dashboard')}}" 
                    class="text-sm p-5 w-full text-end tracking-wide {{Route::is('user.dashboard') ? 'text-primer bg-dasar' : ''}} hover:bg-dasar hover:text-sekunder duration-200"
                >Dashboard</a>
                <a href="{{route('user.profile')}}" 
                    class="text-sm p-5 w-full text-end tracking-wide {{Route::is('user.profile') ? 'text-primer bg-dasar' : ''}} hover:bg-dasar hover:text-primer duration-200"
                >Profil</a>
                <a href="{{route('user.informasi')}}" 
                    class="text-sm p-5 w-full text-end tracking-wide {{Route::is('user.informasi') ? 'text-primer bg-dasar' : ''}} hover:bg-dasar hover:text-primer duration-200"
                >Informasi</a>
                <a href="" 
                    class="text-sm p-5 w-full text-end tracking-wide {{Route::is('user.dashboard' ? 'text-primer bg-dasar' : '')}} hover:bg-dasar hover:text-primer duration-200"
                >Q&A</a>
            </div>
        </nav>
        
        <!-- script nav menu mobile -->
        <script>
            const barMobile = document.getElementById("barMobile");
            const navMobile = document.getElementById("navMobile");

            barMobile.addEventListener("click", function(e) {
                navMobile.classList.toggle("hidden");
            });
        </script>