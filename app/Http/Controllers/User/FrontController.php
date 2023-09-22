<?php

namespace App\Http\Controllers\User;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Question;

class FrontController extends Controller
{
    public function index()
    {
        $article = Article::all();
        $qna = Question::where('active','on')->get();
        return view('front.index',compact('article','qna'));
    }

    public function informasi()
    {
        $article = Article::all();
        return view('front.article',compact('article'));
    }

    public function detail_informasi($slug)
    {
        $articles = Article::where('slug', $slug)->firstOrFail();
        $article = Article::all();
        return view('front.detail_article', compact('articles','article'));
    
    }

    public function about()
    {
        return view('front.about');
    }

    // public function kelengkapan(Request $request)
    // {
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
        $qna = Question::where('active', 'on')->get();
        return view('front.qna', compact('qna'));
    }
}
