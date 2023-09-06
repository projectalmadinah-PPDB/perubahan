@extends('front.dashboard.layouts.parent')

@section('title','Profile')

@section('content')
<main class="w-full min-h-screen h-auto pt-12 md:pt-24">
    <!-- content biodata -->
    <section class="w-full flex flex-wrap justify-center items-start px-10 md:px-20 pt-10 pb-14 gap-10">
        @if ($user)
        @if ($user->status == 'Belum')
        <a href="" class=" text-xs md:text-sm py-3 px-7 rounded-3xl border border-sekunder bg-sekunder hover:bg-sekunder/20 duration-200 text-dasar">
            Silahkan Menunggu Kabar Kamu Belum Di Verifikasi
        </a>
        @elseif ($user->status == 'TidakSah')
        <a href="" class=" text-xs md:text-sm py-3 px-7 rounded-3xl border border-sekunder bg-sekunder hover:bg-sekunder/20 duration-200 text-dasar">
            Data Mu Mungkin Tidak Sah Silahkan Menunggu Kabar Dari Kami
        </a>
        @else
        @if (!$user->student)
        <a href="{{route('user.kelengkapan')}}" class="py-2 px-4 border-2 rounded-full font-semibold tracking-wider border-sekunder bg-sekunder hover:bg-sekunder/50 duration-200 ease-in-out text-white">!Silahkan Lengkapi Data Diri!</a>
        @elseif(!$user->document)
        <div class="flex flex-col justify-start items-start gap-y-5 ring-1 ring-sekunder rounded-lg w-full md:w-[48%] py-3 px-7">
            <h1 class="text-lg font-bold border-b-2 border-sekunder mt-4 leading-5">Biodata Peserta</h1>
                <table class="w-full border-none text-sm text-slate-600">
                    <tbody>
                        <tr>
                            <td class="font-semibold py-4">Nama</td>
                            <td class="font-light tracking-wide py-4">{{$user->name}}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold py-4">Usia</td>
                            <td class="font-light tracking-wide py-4">10</td>
                        </tr>
                        <tr>
                            <td class="font-semibold py-4">Tanggal Lahir</td>
                            <td class="font-light tracking-wide py-4">{{$user->tanggal_lahir}}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold py-4">Jenis Kelamin</td>
                            <td class="font-light tracking-wide py-4">{{$user->jenis_kelamin}}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold py-4">No. Whatsapp</td>
                            <td class="font-light tracking-wide py-4">{{$user->nomor}}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold py-4">Pendidikan Terakhir</td>
                            <td class="font-light tracking-wide py-4">{{$user->student->last_graduate}}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold py-4">Asal Sekolah</td>
                            <td class="font-light tracking-wide py-4">{{$user->student->old_school}}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold py-4">Pengalaman Organisasi</td>
                            <td class="font-light tracking-wide py-4">{{$user->student->organization_exp}}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold py-4">Alamat Lengkap</td>
                            <td class="font-light tracking-wide py-4">{{$user->student->address}}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold py-4">NIK</td>
                            <td class="font-light tracking-wide py-4">{{$user->student->nik}}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold py-4">NISN</td>
                            <td class="font-light tracking-wide py-4">{{$user->student->nisn}}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold py-4">Hobi</td>
                            <td class="font-light tracking-wide py-4">{{$user->student->hobby}}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold py-4">Cita - Cita</td>
                            <td class="font-light tracking-wide py-4">{{$user->student->ambition}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="flex flex-col justify-start items-start gap-y-5 ring-1 ring-sekunder rounded-lg w-full md:w-[48%] py-3 px-7">
                <h1 class="text-lg font-bold border-b-2 border-sekunder mt-4 leading-5">Biodata Orang Tua</h1>
                <table class="w-full border-none text-sm text-slate-600">
                    <tbody>
                        <tr>
                            <td class="font-semibold py-4">Nama Ayah</td>
                            <td class="font-light tracking-wide py-4">{{$user->parents->father_name}}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold py-4">No. Whatsapp Ayah</td>
                            <td class="font-light tracking-wide py-4">{{$user->parents->father_phone}}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold py-4">Nama Ibu</td>
                            <td class="font-light tracking-wide py-4">{{$user->parents->mother_name}}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold py-4">No. Whatsapp Ibu</td>
                            <td class="font-light tracking-wide py-4">{{$user->parents->mother_phone}}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold py-4">Pekerjaan Ayah</td>
                            <td class="font-light tracking-wide py-4">{{$user->parents->father_job}}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold py-4">Pekerjaan Ibu</td>
                            <td class="font-light tracking-wide py-4">{{$user->parents->mother_job}}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold py-4">Penghasilan Orangtua</td>
                            <td class="font-light tracking-wide py-4">
                                @if ($user->parents->parent_earning == 'A')
                                Kurang dari 1.000.000
                                @elseif($user->parents->parent_earning == 'B')
                                1.000.000 - 5.000.000
                                @elseif($user->parents->parent_earning == 'C')
                                5.000.000 - 10.000.000
                                @else
                                Lebih dari 10.000.000
                                @endif
                                Rupiah
                            </td>
                        </tr>
                        <tr>
                            <td class="font-semibold py-4">Jumlah Saudara</td>
                            <td class="font-light tracking-wide py-4">{{$user->parents->no_of_sibling}}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold py-4">Anak Ke-</td>
                            <td class="font-light tracking-wide py-4">{{$user->parents->child_no}}</td>
                        </tr>
                    </tbody>
                </table>
            </div> 
        <div class="flex flex-col justify-start items-start gap-y-5 ring-1 ring-sekunder rounded-lg w-full py-3 px-7">
            <h1 class="text-lg font-bold border-b-2 border-sekunder mt-4 leading-5">Kelengkapan Dokumen</h1>
            <table class="w-full border-none text-sm text-slate-600">
                <thead>
                    <tr class="border border-primer bg-primer text-white tracking-wide">
                        <th class="py-3 font-semibold">Kartu Keluarga</th>
                        <th class="py-3 font-semibold">Akte Kelahiran</th>
                        <th class="py-3 font-semibold">Ijazah Pendidikan Terakhir</th>
                        <th class="py-3 font-semibold">Rapor Pendidikan Terakhir</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!$user->document)
                    <a href="{{route('user.document')}}" class="w-full text-center py-2 px-4 border-2 rounded-full font-semibold tracking-wider border-sekunder bg-sekunder hover:bg-sekunder/50 duration-200 ease-in-out text-white">!Silahkan Lengkapi Data Diri!</a> 
                    @else
                    <tr class="border border-primer">
                        <td class="px-1 py-3 w-1/4">
                            <!-- if (document) -->
                            <object 
                                class="bg-slate-200 dark:bg-slate-800 w-full rounded-[30px] shadow-inner" height="400" 
                            type="application/pdf" data="{{ asset('storage/' . $user->document->kk) }}"></object>
                            <!-- else -->
                            {{-- <p class="text-sm text-center italic">Belum mengupload dokumen</p> --}}
                        </td>
                        <td class="px-1 py-3 w-1/4">
                            <!-- if (document) -->
                            <object 
                                class="bg-slate-200 dark:bg-slate-800 w-full rounded-[30px] shadow-inner" height="400" 
                            type="application/pdf" data="{{ asset('storage/' . $user->document->akta) }}"></object> 
                            <!-- else -->
                            {{-- <p class="text-sm text-center italic">Belum mengupload dokumen</p> --}}
                        </td>
                        <td class="px-1 py-3 w-1/4">
                            <!-- if (document) -->
                            <object 
                                class="bg-slate-200 dark:bg-slate-800 w-full rounded-[30px] shadow-inner" height="400" 
                            type="application/pdf" data="{{ asset('storage/' . $user->document->ijazah) }}"></object>
                            <!-- else -->
                            {{-- <p class="text-sm text-center italic">Belum mengupload dokumen</p> --}}
                        </td>
                        <td class="px-1 py-3 w-1/4">
                            <!-- if (document) -->
                            <object 
                                class="bg-slate-200 dark:bg-slate-800 w-full rounded-[30px] shadow-inner" height="400" 
                            type="application/pdf" data="{{ asset('storage/' . $user->document->rapor) }}"></object>
                            <!-- else -->
                            {{-- <p class="text-sm text-center italic">Belum mengupload dokumen</p> --}}
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
        @endif
        @endif
        @endif
        
    </section>

    <!-- footer -->
    <footer
        class="py-1 px-3 text-end text-xs bg-transparent fixed bottom-0 w-full text-primer">
        © 2023 - 
        <a class="tracking-wide" href="https://tailwind-elements.com/"
            >Sekolah Ar-Romusha</a
        >
    </footer>
</main>
@endsection