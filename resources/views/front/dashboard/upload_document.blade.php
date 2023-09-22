<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @include('front.layouts.include')
    @vite(['resources/css/real.css'])
    <title>Document</title>
    <script>
        if(session('pribadi')){
            Swal.fire(
            'Good job!',
            'You clicked the button!',
            'success'
            )
        }
    </script>
</head>
<body>
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
    <div class="bg-gradient-to-br from-dasar via-sky-50 to-sky-200 w-full py-[53rem] sm:py-[20rem] md:py-72 lg:py-80 h-auto font-poppins caret-sekunder accent-primer">
        <img src="/dists/images/logo_only_currentColor.svg" draggable="false" class="fixed w-[70rem] opacity-20 -bottom-52">
        <main class="w-full h-screen flex justify-center items-center">
            <!-- formulir pendaftaran -->
            <section 
                class="relative w-full flex justify-center items-center py-7 tracking-wide px-10 sm:px-20 md:px-40 lg:px-80">
                <div class="bg-gradient-to-t from-primer to-sky-900 flex flex-col justify-center items-center gap-y-3 px-5 md:px-10 pt-14 pb-7 rounded-3xl text-dasar">
                    <div class="py-[16px] px-[14px] rounded-full absolute z-999 top-0 bg-dasar shadow-2xl">
                        <img src="/dists/images/logo_only.svg" alt="" class="w-10">
                    </div>
                    <h1 class="text-2xl font-bold text-center leading-none">Upload Dokumen.</h1>
                    <p class="text-sm text-center tracking-wide font-light text-gray-400">
                        Upload dokumen persyaratan melalui form dibawah ini.
                    </p>
                    <form action="{{route('user.document.process')}}" class="mt-2 w-full" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <ul class="flex flex-row flex-wrap justify-center items-center md:items-start w-full gap-5">
                            <li class="w-full sm:w-5/12 mt-3">
                                <div class="mb-3 w-full">
                                    <label for="" class="text-sm">Dokumen Akte Kelahiran</label>
                                    <input name="akta" onchange="previewPDF('inputAkte', 'outputAkte')" id="inputAkte"
                                    type="file" accept="application/pdf"
                                    class="shadow-inner rounded-full w-full py-2 px-4 outline-none text-sm bg-white/10 file:rounded-full file:border-sekunder file:border-solid file:text-sekunder file:bg-sekunder/10 file:hover:border-sekunder file:hover:bg-sekunder/70 file:hover:text-dasar file:font-medium file:border file:lowercase file:text-sm file:duration-200"
                                    >
                                    @error('akta')
                                    <p class="text-red-500 text-xs italic">{{$message}}.</p>  
                                    @enderror
                                </div>
                                <!-- pdf preview -->
                                <div class="w-full">
                                    <label for="" class="text-sm">Preview - Akte Kelahiran</label>
                                    <object id="outputAkte"
                                    class="bg-gradient-to-t from-primer to-sky-950 w-full rounded-[30px] shadow-inner" height="400" 
                                    type="application/pdf"></object>
                                </div>
                            </li>
                            <li class="w-full sm:w-5/12 mt-3">
                                <div class="mb-3 w-full">
                                    <label for="" class="text-sm">Dokumen Kartu Keluarga</label>
                                    <input name="kk" onchange="previewPDF('inputKk', 'outputKk')" id="inputKk"
                                    type="file" accept="application/pdf"
                                    class="shadow-inner rounded-full w-full py-2 px-4 outline-none text-sm bg-white/10 file:rounded-full file:border-sekunder file:border-solid file:text-sekunder file:bg-sekunder/10 file:hover:border-sekunder file:hover:bg-sekunder/70 file:hover:text-dasar file:font-medium file:border file:lowercase file:text-sm file:duration-200"
                                    >
                                    @error('kk')
                                    <p class="text-red-500 text-xs italic">{{$message}}.</p>  
                                    @enderror
                                </div>
                                <!-- pdf preview -->
                                <div class="w-full">
                                    <label for="" class="text-sm">Preview - Kartu Keluarga</label>
                                    <object id="outputKk" 
                                    class="bg-gradient-to-t from-primer to-sky-950 w-full rounded-[30px] shadow-inner" height="400" 
                                    type="application/pdf"></object>
                                </div>
                            </li>
                            <li class="w-full sm:w-5/12 mt-3">
                                <div class="mb-3 w-full">
                                    <label for="" class="text-sm">Dokumen Ijazah Kelulusan</label>
                                    <input name="ijazah" onchange="previewPDF('inputIjazah', 'outputIjazah')" id="inputIjazah"
                                    type="file" accept="application/pdf"
                                    class="shadow-inner rounded-full w-full py-2 px-4 outline-none text-sm bg-white/10 file:rounded-full file:border-sekunder file:border-solid file:text-sekunder file:bg-sekunder/10 file:hover:border-sekunder file:hover:bg-sekunder/70 file:hover:text-dasar file:font-medium file:border file:lowercase file:text-sm file:duration-200"
                                    >
                                    @error('ijazah')
                                    <p class="text-red-500 text-xs italic">{{$message}}.</p>  
                                    @enderror
                                </div>
                                <!-- pdf preview -->
                                <div class="w-full">
                                    <label for="" class="text-sm">Preview - Ijazah Kelulusan</label>
                                    <object id="outputIjazah" 
                                    class="bg-gradient-to-t from-primer to-sky-950 w-full rounded-[30px] shadow-inner" height="400" 
                                    type="application/pdf"></object>
                                </div>
                            </li>
                            <li class="w-full sm:w-5/12 mt-3">
                                <div class="mb-3 w-full">
                                    <label for="" class="text-sm">Dokumen Rapor Pendidikan Terakhir</label>
                                    <input name="rapor" onchange="previewPDF('inputRapor', 'outputRapor')" id="inputRapor"
                                    type="file" accept="application/pdf"
                                    class="shadow-inner rounded-full w-full py-2 px-4 outline-none text-sm bg-white/10 file:rounded-full file:border-sekunder file:border-solid file:text-sekunder file:bg-sekunder/10 file:hover:border-sekunder file:hover:bg-sekunder/70 file:hover:text-dasar file:font-medium file:border file:lowercase file:text-sm file:duration-200"
                                    >
                                    @error('rapor')
                                    <p class="text-red-500 text-xs italic">{{$message}}.</p>  
                                    @enderror
                                </div>
                                <!-- pdf preview -->
                                <div class="w-full">
                                    <label for="" class="text-sm">Preview - Rapor Pendidikan Terakhir</label>
                                    <object id="outputRapor" 
                                    class="bg-gradient-to-t from-primer to-sky-950 w-full rounded-[30px] shadow-inner" height="400" 
                                    type="application/pdf"></object>
                                </div>
                            </li>
                            
                            <script>
                                function previewPDF(inputId, outputId) {
                                    const pdfInput = document.getElementById(inputId);
                                    const pdfPreview = document.getElementById(outputId);
                                    
                                    pdfPreview.removeAttribute('data');
                                    
                                    const file = pdfInput.files[0];
                                    if (file) {
                                        pdfPreview.setAttribute('data', URL.createObjectURL(file));
                                    }
                                }
                            </script>
                        </ul>
                        <button type="submit" 
                            class="w-full py-2 mt-3 px-4 border-2 rounded-full font-semibold tracking-wider border-sekunder bg-sekunder hover:bg-sekunder/50 duration-200 ease-in-out">
                            Kirim
                        </button>
                    </form>
                </div>
            </section>

            <footer
                class="py-4 text-center text-xs bg-slate-900 fixed bottom-0 w-full text-dasar">
                © 2023 - 
                <a class="tracking-wide" href="https://tailwind-elements.com/"
                    >Sekolah Ar-Romusha</a
                >
            </footer>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</body>
</html>