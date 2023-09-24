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
<body class="overflow-y-scroll py-[42rem] bg-gradient-to-br from-dasar via-sky-50 to-sky-100">
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
    <div class=" w-full font-poppins caret-sekunder accent-primer py-5">
        <img src="../dists/images/logo_only_currentColor.svg" draggable="false" class="fixed w-[70rem] opacity-20 -bottom-52">
        <main class="w-full h-screen flex justify-center items-center">
            <!-- formulir kelengkapan data diri -->
            <section 
                class="relative w-full flex flex-col justify-center items-center py-7 gap-y-5 tracking-wide">
                <div class="bg-gradient-to-t from-primer to-sky-900 flex flex-col justify-center items-center gap-y-3 px-5 md:px-9 py-16 rounded-3xl text-dasar">
                    <div class="py-[16px] px-[14px] rounded-full absolute z-999 top-0 bg-dasar shadow-2xl">
                        <img src="../dists/images/logo_only.svg" alt="" class="w-10">
                    </div>
                    <h1 class="text-4xl font-bold text-center leading-none">Form Data Diri.</h1>
                    <p class="text-xs tracking-wide font-light text-gray-400 px-24 md:px-36">
                        Lengkapi formulir dibawah ini dengan teliti dan benar.
                    </p>
                    <form class="forms mt-4 w-full" action="{{route('user.kelengkapan.process')}}" method="post">
                        @csrf
                        @method('POST')
                        <div class="mb-3">
                            <label for="" class="text-sm text-slate-200">Tempat Lahir</label>
                            <input 
                                type="text" name="birthplace"
                                class="shadow-inner tracking-wider rounded-full w-full py-2 px-4 outline-none placeholder:opacity-100 focus:placeholder:opacity-0 placeholder:transition-all placeholder:duration-200 placeholder:italic text-md placeholder:text-gray-500 bg-white/10"
                            >
                        </div>
                        <div class="mb-3">
                            <label for="" class="text-sm text-slate-200">Alamat Lengkap</label>
                            <textarea name="address"
                            type="text" style="min-height: 2.3rem; height: 4.6rem; max-height: 6rem;"
                            class="shadow-inner tracking-wider rounded-3xl w-full py-2 px-4 outline-none placeholder:opacity-100 focus:placeholder:opacity-0 placeholder:transition-all placeholder:duration-200 placeholder:italic text-md placeholder:text-gray-500 bg-white/10"
                            ></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="" class="text-sm text-slate-200">NIK <span class="text-[10px] text-slate-400">(Nomor Induk Kependudukan)</span></label>
                            <input 
                                type="number" name="nik"
                                class="numb-no shadow-inner tracking-wider rounded-full w-full py-2 px-4 outline-none placeholder:opacity-100 focus:placeholder:opacity-0 placeholder:transition-all placeholder:duration-200 placeholder:italic text-md placeholder:text-gray-500 bg-white/10"
                            >
                        </div>
                        <div class="mb-3">
                            <label for="" class="text-sm text-slate-200">NISN <span class="text-[10px] text-slate-400">(Nomor Induk Siswa Nasional)</span></label>
                            <input 
                                type="number" name="nisn"
                                class="numb-no shadow-inner tracking-wider rounded-full w-full py-2 px-4 outline-none placeholder:opacity-100 focus:placeholder:opacity-0 placeholder:transition-all placeholder:duration-200 placeholder:italic text-md placeholder:text-gray-500 bg-white/10"
                            >
                        </div>
                        <div class="mb-3 relative">
                            <label for="" class="text-sm text-slate-200">Pendidikan Terakhir</label>
                            <select name="last_graduate"
                                class="shadow-inner tracking-wider rounded-full w-full py-2 px-4 outline-none placeholder:opacity-100 focus:placeholder:opacity-0 placeholder:transition-all placeholder:duration-200 placeholder:italic text-md placeholder:text-gray-500 bg-white/10">
                                <option class="text-slate-300" hidden disabled selected>- Pilih Pendidikan Terakhir Kamu -</option>
                                <option class="text-primer" value="TK">TK</option>
                                <option class="text-primer" value="SD">SD</option>
                                <option class="text-primer" value="SMP">SMP</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="text-sm text-slate-200">Asal Sekolah</label>
                            <input 
                                type="text" name="old_school"
                                class="shadow-inner tracking-wider rounded-full w-full py-2 px-4 outline-none placeholder:opacity-100 focus:placeholder:opacity-0 placeholder:transition-all placeholder:duration-200 placeholder:italic text-md placeholder:text-gray-500 bg-white/10"
                            >
                        </div>
                        <div class="mb-3">
                            <label for="" class="text-sm text-slate-200">Pengalaman Organisasi</label>
                            <textarea name="organization_exp"
                            type="text" style="min-height: 2.3rem; height: 4.6rem; max-height: 6rem;"
                            class="shadow-inner tracking-wider rounded-3xl w-full py-2 px-4 outline-none placeholder:opacity-100 focus:placeholder:opacity-0 placeholder:transition-all placeholder:duration-200 placeholder:italic text-md placeholder:text-gray-500 bg-white/10"
                            ></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="" class="text-sm text-slate-200">Hobi</label>
                            <textarea name="hobby"
                            type="text" style="min-height: 2.3rem; height: 4.6rem; max-height: 6rem;"
                            class="shadow-inner tracking-wider rounded-3xl w-full py-2 px-4 outline-none placeholder:opacity-100 focus:placeholder:opacity-0 placeholder:transition-all placeholder:duration-200 placeholder:italic text-md placeholder:text-gray-500 bg-white/10"
                            ></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="" class="text-sm text-slate-200">Cita-Cita</label>
                            <textarea name="ambition"
                            type="text" style="min-height: 2.3rem; height: 4.6rem; max-height: 6rem;"
                            class="shadow-inner tracking-wider rounded-3xl w-full py-2 px-4 outline-none placeholder:opacity-100 focus:placeholder:opacity-0 placeholder:transition-all placeholder:duration-200 placeholder:italic text-md placeholder:text-gray-500 bg-white/10"
                            ></textarea>
                        </div>

                        <!-- divider -->
                        <div class="w-full my-5 h-0.5 bg-slate-400 rounded-full"></div>
                        <!-- end divider -->

                        <div class="mb-3">
                            <label for="" class="text-sm text-slate-200">Nama Ayah</label>
                            <input 
                                type="text" name="father_name"
                                class="shadow-inner tracking-wider rounded-full w-full py-2 px-4 outline-none placeholder:opacity-100 focus:placeholder:opacity-0 placeholder:transition-all placeholder:duration-200 placeholder:italic text-md placeholder:text-gray-500 bg-white/10"
                            >
                            <span class="text-xs text-slate-500">Isi "tidak ada" jika yatim</span>
                        </div>
                        <div class="mb-3">
                            <label for="" class="text-sm text-slate-200">Pekerjaan Ayah</label>
                            <input 
                                type="text" name="father_job"
                                class="shadow-inner tracking-wider rounded-full w-full py-2 px-4 outline-none placeholder:opacity-100 focus:placeholder:opacity-0 placeholder:transition-all placeholder:duration-200 placeholder:italic text-md placeholder:text-gray-500 bg-white/10"
                            >
                            <span class="text-xs text-slate-500">Isi "tidak ada" jika yatim</span>
                        </div>
                        <div class="mb-3">
                            <label for="" class="text-sm text-slate-200">No Whatsapp Ayah</label>
                            <input 
                                type="number" name="father_phone"
                                class="numb-no shadow-inner tracking-wider rounded-full w-full py-2 px-4 outline-none placeholder:opacity-100 focus:placeholder:opacity-0 placeholder:transition-all placeholder:duration-200 placeholder:italic text-md placeholder:text-gray-500 bg-white/10"
                            >
                            <span class="text-xs text-slate-500 block mt-2">Contoh : 0896XXXXXXXX</span>
                            <span class="text-xs text-slate-500">Isi "tidak ada" jika yatim</span>
                        </div>
                        <div class="mb-3">
                            <label for="" class="text-sm text-slate-200">Nama Ibu</label>
                            <input 
                                type="text" name="mother_name"
                                class="shadow-inner tracking-wider rounded-full w-full py-2 px-4 outline-none placeholder:opacity-100 focus:placeholder:opacity-0 placeholder:transition-all placeholder:duration-200 placeholder:italic text-md placeholder:text-gray-500 bg-white/10"
                            >
                            <span class="text-xs text-slate-500">Isi "tidak ada" jika piatu</span>
                        </div>
                        <div class="mb-3">
                            <label for="" class="text-sm text-slate-200">Pekerjaan Ibu</label>
                            <input 
                                type="text" name="mother_job"
                                class="shadow-inner tracking-wider rounded-full w-full py-2 px-4 outline-none placeholder:opacity-100 focus:placeholder:opacity-0 placeholder:transition-all placeholder:duration-200 placeholder:italic text-md placeholder:text-gray-500 bg-white/10"
                            >
                            <span class="text-xs text-slate-500">Isi "tidak ada" jika piatu</span>
                        </div>
                        <div class="mb-3">
                            <label for="" class="text-sm text-slate-200">No Whatsapp Ibu</label>
                            <input 
                                type="number" name="mother_phone"
                                class="numb-no shadow-inner tracking-wider rounded-full w-full py-2 px-4 outline-none placeholder:opacity-100 focus:placeholder:opacity-0 placeholder:transition-all placeholder:duration-200 placeholder:italic text-md placeholder:text-gray-500 bg-white/10"
                            >
                            <span class="text-xs text-slate-500 block mt-2">Contoh : 0896XXXXXXXX</span>
                            <span class="text-xs text-slate-500">Isi "tidak ada" jika piatu</span>
                        </div>
                        <div class="mb-3">
                            <label for="" class="text-sm text-slate-200">Penghasilan Orang Tua</label>
                            <select name="parent_earning"
                                class="shadow-inner tracking-wider rounded-full w-full py-2 px-4 outline-none placeholder:opacity-100 focus:placeholder:opacity-0 placeholder:transition-all placeholder:duration-200 placeholder:italic text-md placeholder:text-gray-500 bg-white/10">
                                <option class="text-slate-300" hidden disabled selected>- Pilih penghasilan orangtuamu -</option>
                                <option class="text-primer" value="A">Kurang dari 1.000.000</option>
                                <option class="text-primer" value="B">1.000.000 - 5.000.000</option>
                                <option class="text-primer" value="C">5.000.000 - 10.000.000</option>
                                <option class="text-primer" value="D">Lebih dari 10.000.000</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="text-sm text-slate-200">Anak Ke-</label>
                            <input 
                                type="number" min="1" name="child_no"
                                class="shadow-inner tracking-wider rounded-full w-full py-2 px-4 outline-none placeholder:opacity-100 focus:placeholder:opacity-0 placeholder:transition-all placeholder:duration-200 placeholder:italic text-md placeholder:text-gray-500 bg-white/10"
                            >
                            <span class="text-xs text-slate-500">Contoh : 1</span>
                        </div>
                        <div class="mb-3">
                            <label for="" class="text-sm text-slate-200">Jumlah Saudara</label>
                            <input 
                                type="number" min="0" name="no_of_sibling"
                                class="shadow-inner tracking-wider rounded-full w-full py-2 px-4 outline-none placeholder:opacity-100 focus:placeholder:opacity-0 placeholder:transition-all placeholder:duration-200 placeholder:italic text-md placeholder:text-gray-500 bg-white/10"
                            >
                            <span class="text-xs text-slate-500">Isi "0" jika tidak punya saudara</span>
                        </div>
                        <button type="submit" 
                            class="w-full py-2 mt-3 px-4 border-2 rounded-full font-semibold tracking-wider border-sekunder bg-sekunder hover:bg-sekunder/50 duration-200 ease-in-out">
                            Kirim
                        </button>
                    </form>
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