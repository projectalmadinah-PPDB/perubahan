<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ExportLaporan;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Document;
use App\Models\Generasi;
use App\Models\Payment;
use App\Models\Question;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    public function index()
    {
        // data pendaftar
        $data = User::where('role','user')->with('student')->orderby('id','desc')->get();

        // perhitungan rata-rata umur pendaftar
        $totalUmur = 0;
        $jumlahPeserta = count($data);

        foreach ($data as $user) {
            $tanggalLahir = date_create($user->tanggal_lahir);
            $umur = date_diff(date_create(), $tanggalLahir)->y;
            $totalUmur += $umur;
        }

        if ($jumlahPeserta > 0) {
            $rataRataUmur = $totalUmur / $jumlahPeserta;
        } else {
            $rataRataUmur = 0;
        }
        // panggil {{ $raRataUmur }}

        // rata-rata jenis kelamin
            // $pria = count($data->where('jenis_kelamin', 'Laki-Laki'));
            // $wanita = count($data->where('jenis_kelamin', 'Perempuan'));

        // rata-rata pendidikan terakhir
            // $jumlahTK = count($data->where('asal_sekolah', 'TK'));
            // $jumlahSD = count($data->where('asal_sekolah', 'SD'));
            // $jumlahSMP = count($data->where('asal_sekolah', 'SMP'));

        // data pendaftar yang udah mbayar
        $peserta = User::whereHas('payment', function ($query) {
            $query->where('status', 'berhasil');
        })->orderby('id','desc');

        // data pembayaran yang dilakukan
        $payment = Payment::orderBy('updated_at','desc')->take(7);

        // data seluruh pendaftar mengacu pada tiap generasi
        $generasi = Generasi::with('user')->get();

        return view('pages.admin.dashboard.laporan.index', compact('generasi','data','rataRataUmur','peserta','payment'));
    }

    public function export($id)
    {
        $generasi = Generasi::find($id);
        $user = User::where('id',$generasi->id)->first();

        return Excel::download(new ExportLaporan($generasi->id), "Laporan Generasi $generasi->generasi.xlsx");
    }
}
