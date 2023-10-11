@extends('front.layouts.parent')

@section('title','Pengumuman Kelulusan')
@section('content')
<main class="w-full pt-14">
    <section class="w-full flex flex-col justify-center items-center pt-20 pb-5 px-10 md:px-32 lg:px-60 min-h-min h-auto">
        <span
            class="inline-flex items-center rounded-[3rem] bg-emerald-200 px-2 py-1 text-xs font-medium text-emerald-700 ring-1 ring-inset ring-emerald-700 mb-3"
        >C.O.N.G.R.A.T.S</span>
        <h1 class="text-3xl font-bold title">Pengumuman Kelulusan.</h1>
        <p class="mt-2 mb-14 text-sm text-gray-700 tracking-wide">
            Semoga nama kamu ada di daftar peserta yang lolos.
        </p>
        <div class="w-full overflow-auto lg:overflow-visible">
            <table class="table w-full text-primer border-separate space-y-6 text-sm tracking-wider">
                <caption class="py-3 text-lg font-bold capitalize"># Daftar calon peserta didik yang lulus - {{ $peserta->where('status', 'Lulus')->count() }} Orang</caption>
                <thead class="bg-primer text-dasar w-full">
                    <tr class="w-full">
                        <th class="p-3 rounded-md shadow-md">No</th>
                        <th class="p-3 rounded-md shadow-md w-40">NISN</th>
                        <th class="p-3 rounded-md shadow-md min-w-full">Nama Lengkap</th>
                        <th class="p-3 rounded-md shadow-md w-32">Keterangan</th>
                    </tr>
                </thead>
                <tbody class="bg-dasar">
                    @forelse ($peserta->where('status', 'Lulus') as $item)
                        <tr class="mt-3">
                            <th class="p-3 rounded-md shadow-md text-center" scope="row">#{{ $loop->iteration }}</th>
                            <td class="p-3 rounded-md shadow-md text-center">
                                {{-- {{ $item->student->nisn }} --}}
                            </td>
                            <td class="p-3 px-5 rounded-md shadow-md">
                                {{ $item->name }}
                            </td>
                            <td class="p-3 rounded-md shadow-md text-center bg-berhasil text-dasar font-bold">{{ $item->status }}</td>
                        </tr>
                    @empty
                        <tr class="mt-3">
                            <td class="p-3 rounded-md shadow-md text-center" colspan="4">Tidak Ada Data Terkait</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="w-full overflow-auto lg:overflow-visible mt-20">
            <table class="table w-full text-primer border-separate space-y-6 text-sm tracking-wider">
                <caption class="py-3 text-lg font-bold capitalize"># Daftar calon peserta didik yang gagal - {{ $peserta->where('status', 'Gagal')->count() }} Orang</caption>
                <thead class="bg-primer text-dasar w-full">
                    <tr class="w-full">
                        <th class="p-3 rounded-md shadow-md">No</th>
                        <th class="p-3 rounded-md shadow-md w-40">NISN</th>
                        <th class="p-3 rounded-md shadow-md min-w-full">Nama Lengkap</th>
                        <th class="p-3 rounded-md shadow-md w-32">Keterangan</th>
                    </tr>
                </thead>
                <tbody class="bg-dasar">
                    @forelse ($peserta->where('status', 'Gagal') as $item)
                        <tr class="mt-3">
                            <th class="p-3 rounded-md shadow-md text-center" scope="row">#{{ $loop->iteration }}</th>
                            <td class="p-3 rounded-md shadow-md text-center">
                                {{-- {{ $item->student->nisn }} --}}
                            </td>
                            <td class="p-3 px-5 rounded-md shadow-md">
                                {{ $item->name }}
                            </td>
                            <td class="p-3 rounded-md shadow-md text-center bg-larangan text-dasar font-bold">{{ $item->status }}</td>
                        </tr>
                    @empty
                        <tr class="mt-3">
                            <td class="p-3 rounded-md shadow-md text-center" colspan="4">Tidak Ada Data Terkait</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    <section class="pt-16 pb-10 px-5 md:px-10 lg:px-20 flex flex-col justify-start items-center">
        <span
            class="inline-flex items-center rounded-[3rem] bg-emerald-200 px-2 py-1 text-xs font-medium text-emerald-700 ring-1 ring-inset ring-emerald-700 mb-3"
        >N.O.T.E</span>
        <h1 class="mt-2 text-3xl mb-8 font-bold title">Informasi Singkat.</h1>
        <div class="flex justify-center items-start flex-wrap gap-4 w-full px-10 sm:px-18 md:px-32">
            @forelse ($pengumuman as $item)
            <div class="py-7 px-6 border border-sekunder rounded-xl flex flex-col justify-center gap-y-1 items-center min-w-min w-full text-center min-h-[10rem]">
                <h1 class="leading-5 text-center text-lg font-semibold tracking-wide mb-4">
                    {{ $item->title }}
                </h1>
                <div class="w-full tracking-wide leading-relaxed list-decimal text-start ps-5">
                    {!! $item->desc !!}
                </div>
            </div>
            @empty
                <div class="w-full tracking-wide text-center ps-5">
                    ~ Tidak ada informasi tambahan saat ini. ~
                </div>
            @endforelse
        </div>
    </section>
</main>
@endsection