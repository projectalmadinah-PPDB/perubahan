<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    @include('front.layouts.include')
    @vite(['resources/css/real.css'])
    <title>Isi Data Diri</title>
</head>
<body class="bg-gradient-to-br from-dasar via-sky-50 to-sky-100">
    <!-- 
        patokan warna:

            dasar: '#FCFCFC',
            primer: '#001A42',
            sekunder: '#10B981',
            peringatan: '#FEDF7B',
            infone: '#F8F3D3',
            berhasil: '#00B8A9',
            larangan: '#F7406C',
        
            begitu;
     -->
    <div class=" w-full font-poppins caret-sekunder accent-primer">
        <img src="/dists/images/logo_only_currentColor.svg" draggable="false" class="fixed w-[70rem] opacity-20 -bottom-52">
        <main class="w-full h-screen flex justify-center items-center">
            <!-- formulir kelengkapan data diri -->
            <section 
                class="relative w-full flex flex-col justify-center items-center py-7 gap-y-5 tracking-wide">
                <div class="bg-gradient-to-t from-primer to-sky-900 flex flex-col justify-center items-center gap-y-3 px-5 md:px-9 py-16 rounded-3xl text-dasar">
                    <div class="py-[16px] px-[14px] rounded-full absolute z-999 top-0 bg-dasar shadow-2xl">
                        <img src="/dists/images/logo_only.svg" alt="" class="w-10">
                    </div>
                    <h1 class="text-4xl font-bold text-center leading-none">Detail Pembayaran.</h1>
                    <p class="text-xs tracking-wide font-light text-gray-400 px-24 md:px-36">
                        Pastikan detail pembayaran dibawah ini benar.
                    </p>
                    <div class="mt-4 w-full">
                        <table class="w-full border-0">
                            <tbody class="w-full">
                                <tr class="">
                                    <td class="w-1/3 font-semibold py-2">Nama Lengkap</td>
                                    <td class="px-3">:</td>
                                    <td class="w-2/3 capitalize">{{ $user->name }}</td>
                                </tr>
                                <tr class="">
                                    <td class="w-1/3 font-semibold py-2">Nomor Telepon</td>
                                    <td class="px-3">:</td>
                                    <td class="w-2/3">{{ $user->nomor }}</td>
                                </tr>
                                <tr class="">
                                    <td class="w-1/3 font-semibold py-2">No. Invoice</td>
                                    <td class="px-3">:</td>
                                    <td class="w-2/3">{{ $user->payment->no_invoice }}</td>
                                </tr>
                                <tr class="">
                                    <td class="w-1/3 font-semibold py-2">Status</td>
                                    <td class="px-3">:</td>
                                    <td class="w-2/3">{{ $user->payment->status }}</td>
                                </tr>
                                <tr class="">
                                    <td class="w-1/3 font-semibold py-2">Tipe Pembayaran</td>
                                    <td class="px-3">:</td>
                                    <td class="w-2/3">Biaya Administrasi</td>
                                </tr>
                                <tr class="">
                                    <td class="w-1/3 font-semibold py-2">Total Biaya</td>
                                    <td class="px-3">:</td>
                                    <td class="w-2/3">Rp. 100.000,-</td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- modal invoice -->
                        {{-- <div class="fixed w-full h-screen flex justify-center items-center top-0 left-0 backdrop-blur-sm z-50 bg-slate-900/50">
                            <div class="w-1/3 h-auto min-h-min py-5 px-7 bg-dasar rounded-xl text-primer">
                                <!-- header card modal -->
                                <header class="flex justify-between items-center">
                                    <p>Detail No. Invoice</p>
                                    <button 
                                        class="py-0.5 px-2.5 text-3xl text-dasar rounded-xl bg-sky-950 duration-200 hover:bg-sky-900"
                                    >&times;</button>
                                </header>
                                <section>

                                </section>
                            </div>
                        </div> --}}

                        <div class="flex gap-x-2 items-center mb-4 pt-4">
                            <input type="checkbox" class="accent-sekunder" id="checkBill">
                            <label for="checkBill" class="text-sm text-slate-400">Dana sebesar 100.000 rupiah sudah siap</label>
                        </div>
                        {{-- @dd($user->id) --}}
                        <div class="w-full flex">
                            <a class="w-full" id="paymentLink">
                                <button type="button" id="nextStep" class="w-full text-center py-2 mt-3 border-2 rounded-full font-semibold tracking-wider border-sekunder bg-transparent hover:bg-teal-600/20 duration-200 ease-in-out shadow-md hover:shadow-lg relative text-white/50">Selanjutnya <i class="bi bi-arrow-right group-hover:ms-2 duration-200"></i></button>
                            </a>
                        </div>
                        <script>
                            var chk = document.getElementById("checkBill");
                            var nextStep = document.getElementById("nextStep");
                            var paymentLink = document.getElementById("paymentLink");

                            var nextTrue = "w-full text-center group py-2 mt-3 border-2 rounded-full font-semibold tracking-wider border-sekunder bg-transparent hover:bg-sekunder/50 duration-200 ease-in-out shadow-md hover:shadow-lg relative";
                            var nextFalse = "w-full text-center py-2 mt-3 border-2 rounded-full font-semibold tracking-wider border-sekunder bg-transparent hover:bg-teal-600/20 duration-200 ease-in-out shadow-md hover:shadow-lg relative text-white/50";

                            chk.addEventListener("change", function() {
                                if (chk.checked) {
                                    nextStep.setAttribute("type", "submit");
                                    nextStep.setAttribute("class", nextTrue);
                                    paymentLink.setAttribute("href", "{{ $user->payment->link }}");
                                } else {
                                    nextStep.setAttribute("type", "button");
                                    nextStep.setAttribute("class", nextFalse);
                                    paymentLink.removeAttribute("href");
                                }
                            });
                        </script>
                    </div>
                </div>
            </section>

            <footer
                class="py-2 text-center text-xs bg-slate-900 fixed bottom-0 w-full text-dasar">
                © 2023 - 
                <a class="tracking-wide" href="https://tailwind-elements.com/"
                    >Sekolah Ar-Romusha</a
                >
            </footer>
        </main>
    </div>
</body>
</html>