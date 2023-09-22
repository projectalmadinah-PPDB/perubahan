<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Document;
use App\Models\Payment;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

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
        $data = User::where('role','user')->orderby('id','desc')->get();
        $peserta = User::whereHas('payment', function ($query) {
            $query->where('status', 'berhasil');
        })->orderby('id','desc')->get();
        $payment = Payment::orderby('id','desc')->get();
        $lulus = User::where('role','user')->where('status','Lulus')->get();
        $informasi = Article::get();
        $wawancara = User::where('status','Wawancara')->get();
        $document = Document::get();
        $qna = Question::get();
        return view('pages.admin.dashboard.laporan.index',compact('data','payment','lulus','peserta','informasi','document','qna','wawancara'));
    }
}
