<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('search')){
            $article = Article::where('title','LIKE','%'.$request->search.'%')->paginate(5);
        }
        else{
            $article = Article::with('category')->orderBy('id', 'desc')->paginate(5);
        }
        return view('pages.admin.dashboard.articles.index',compact('article'));
    }
	

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('pages.admin.dashboard.articles.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'image' => 'required',
            'desc' => 'required',
            'category_id' => 'nullable|exists:categories,id',
        ],
    [
        'title.required' => 'Title Wajib Diisi',
        'desc.required' => 'Description Wajib Diisi',
        'image.required' => 'Image Wajib Diisi',
    ]);
        $data['slug'] = Str::slug($request->title);
        $data['user_id'] = Auth::user()->id;

        $image = $request->file('image')->store('assets' , 'public');
        $data['image'] = $image;


        Article::create($data);
        return redirect()->route('admin.article.index')->with('success','Berhasil Menambahkan Article');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $articles = Article::where('slug', $slug)->firstOrFail();
        return view('pages.admin.dashboard.articles.show', compact('articles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $category = Category::all();
        $article = Article::where('slug', $slug)->firstOrFail();
        return view('pages.admin.dashboard.articles.edit',compact('article','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article,$id)
    {
        $article = Article::findOrFail($id);
        
        $data = $request->validate([
            'title' => 'required|string',
            'image' => '',
            'desc' => 'required',
            'category_id' => 'nullable|exists:categories,id',
        ],
        [
            'title.required' => 'Title Wajib Diisi',
            'desc.required' => 'Description Wajib Diisi',
        ]);
        $data['slug'] = Str::slug($request->title);
        if($request->image){
            $image = $request->file('image')->store('assets' , 'public');
            $data['image'] = $image;
            
        }else{
            $article->image;
        }
        
        $article->update($data);
        
        return redirect()->route('admin.article.index' , compact('id'))->with('edit' , 'Artikel Berhasil Di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Article::findOrFail($id);
        // Hapus data post
        $post->delete();

    return redirect()->route('admin.article.index',compact('post'))->with('delete', 'Artickel Berhasil Di Hapus');
    }
}
