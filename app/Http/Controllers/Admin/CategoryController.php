<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('pages.admin.dashboard.category.index',compact('category'));
    }

    public function create()
    {
        return view('pages.admin.dashboard.category.create');
    }

    public function store(Request $request)
    {
        $category = $request->validate([
            'name' => 'required|string'
        ]);
        $category['user_id'] = Auth::user()->id;
        Category::create($category);
        
        return redirect()->route('admin.category.index');
    }

    public function update(Request $request,$id)
    {
        $category = Category::findOrFail($id);
        $categorys = $request->validate([
            'name' => 'required'
        ]);
        $category->update($categorys);

        return redirect()->route('admin.category.index')->with('edit','Berhasil Mengganti Nama Category');
    }

    public function delete(Category $category,$id)
    {
        $categorys = Category::find($id);

        $categorys->delete();

        return redirect()->route('admin.category.index')->with('delete','Berhasil Menghapus Category');
    }
}
