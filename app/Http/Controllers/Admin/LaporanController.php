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
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    public function index()
    {
        // $data = User::where('role','user')->orderby('id','desc')->paginate(5);
        // $peserta = User::whereHas('payment', function ($query) {
        //     $query->where('status', 'berhasil');
        // })->orderby('id','desc')->paginate(5);
        // $payment = Payment::orderby('id','desc')->paginate(5);
        // $lulus = User::where('role','user')->where('status','Lulus')->paginate(5);
        $data = Generasi::where('status', 'on')->with('user')->get();
        return view('pages.admin.dashboard.laporan.index', compact('data'));
    }

    public function export($id)
    {
        $generasi = Generasi::find($id);
        $user = User::where('id',$generasi->id)->first();

        return Excel::download(new ExportLaporan($generasi), "Laporan Generasi $generasi->generasi.xlsx");
    }
}
