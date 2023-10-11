<?php

namespace App\Http\Controllers\User;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\General;
use App\Models\Generasi;
use App\Models\Question;
use App\Models\Section;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $article = Article::all();
        $qna = Question::where('active','on')->get();
        $sections = Section::get();
        return view('front.index',compact('article','qna','user','sections'));
    }

    public function tutor_payment()
    {
        $user = Auth::user();
        $article = Article::all();
        return view('front.detail_tutor_payment', compact('article', 'user'));
    }

    public function informasi()
    {
        $user = Auth::user();
        $article = Article::all();
        return view('front.article',compact('article', 'user'));
    }

    public function detail_informasi($slug)
    {
        $user = Auth::user();
        $articles = Article::where('slug', $slug)->firstOrFail();
        $article = Article::all();
        return view('front.detail_article', compact('articles','article', 'user'));
    }

    public function kelulusan()
    {
        $user = Auth::user();
        $generasi = Generasi::orderBy('id', 'DESC')->where('status', 'on')->first();

        if (!$generasi) {
            return abort(404);
        }

        $peserta = $generasi->user()->get();
        $pengumuman = Announcement::where('step', 'Lulus')->get();

        return view('front.kelulusan', compact('user', 'peserta', 'generasi', 'pengumuman'));
    }

    public function about()
    {
        $user = Auth::user();
        $general = General::first();
        return view('front.about', compact('user', 'general'));
    }

    // public function kelengkapan(Request $request)
    // {
    //     $user = Auth::user();
    //     $validate = $request->validate([
    //         'nik' => 'required|integer',
    //         'nama_ayah' => 'required',
    //         'no_ayah' => 'required',
    //         'nama_ibu' => 'required',
    //         'no_ibu' => 'required',
    //         'alamat' => 'required'
    //     ]);
    //     $validate['user_id'] = Auth::user()->id;
    //     $user = Pendaftaran::create($validate);

    //     return redirect()->route('user.profile')->with('success','Berhasil Melengkapi Data');
    // }
    
    public function qna()
    {
        $user = Auth::user();
        $qna = Question::where('active', 'on')->get();
        return view('front.qna', compact('qna', 'user'));
    }
}
