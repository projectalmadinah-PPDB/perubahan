<?php

namespace App\Http\Controllers\User;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $article = Article::all();
        $qna = Question::where('active','on')->get();
        return view('front.index',compact('article','qna','user'));
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

    public function about()
    {
        $user = Auth::user();
        return view('front.about', compact('user'));
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
