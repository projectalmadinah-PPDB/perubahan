<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ExportLaporan;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Document;
use App\Models\Generasi;
use App\Models\Payment;
use App\Models\Question;
use App\Models\Student;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    public function index()
    {
        // data pendaftar
        $users = User::where('role','user')->with('student')->with('document')->orderby('id','desc')->get();

        // perhitungan rata-rata umur pendaftar
        $totalUmur = 0;
        $jumlahPeserta = count($users);

        foreach ($users as $user) {
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

        $oldest = User::where('role','user')->orderBy('tanggal_lahir', 'ASC')->first();
        $youngest = User::where('role','user')->orderBy('tanggal_lahir', 'DESC')->first();

        // rata-rata jenis kelamin
        $pria = count($users->where('jenis_kelamin', 'Laki-Laki'));
        $wanita = count($users->where('jenis_kelamin', 'Perempuan'));

        $student = Student::orderBy('id', 'DESC')->with('user')->get();

        // rata-rata pendidikan terakhir
        $jumlahTK = count($student->where('last_graduate', 'TK'));
        $jumlahSD = count($student->where('last_graduate', 'SD'));
        $jumlahSMP = count($student->where('last_graduate', 'SMP'));

        // data pendaftar yang udah mbayar
        $peserta = User::whereHas('payment', function ($query) {
            $query->where('status', 'berhasil');
        })->orderby('id','desc');

        // data pembayaran yang dilakukan
        $payment = Payment::orderBy('id','desc')->with('user')->get();

        // data seluruh pendaftar mengacu pada tiap generasi
        $generasi = Generasi::with('user')->get();

        return view('pages.admin.dashboard.laporan.index', 
        compact('generasi','users','rataRataUmur','peserta','payment','oldest','youngest','pria','wanita','jumlahTK','jumlahSD','jumlahSMP'));
    }

    public function export($id)
    {
        $generasi = Generasi::find($id);
        $user = User::where('id',$generasi->id)->first();

        return Excel::download(new ExportLaporan($generasi->id), "Laporan Generasi $generasi->generasi.xlsx");
    }
}
