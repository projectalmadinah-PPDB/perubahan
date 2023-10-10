<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Home;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $home = Home::first();
        $sections = Section::get();
        return view('pages.admin.dashboard.section.index', compact('home', 'sections'));
    }

    public function updateHome(Request $request, Home $home)
    {
        $homes = Home::where('id',1)->first();
        $data = $request->validate([
            'title' => 'required|string',
            'desc' => 'required',
        ]);
    
        $data['user_id'] = Auth::user()->id;
    
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('assets', 'public');
            $data['image'] = $image;
        }
        
        $homes->update($data);
    
        return redirect()->route('admin.section.index')->with('success', 'Anda berhasil mengubah Hero Section Homepage!');
    }    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        // dd($request->all());
        $data = $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'image' => 'required'
        ],
        [
            'title.string' => 'Harus berupa string',
            'desc.required' => 'Desc Wajib Diisi',
        ]);

        $data['user_id'] = Auth::user()->id;

        // upload dan simpan gambar
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('assets', 'public');
            $data['image'] = $image;
        }

        Section::create($data);

        return redirect()->route('admin.section.index')->with('Tambah section berhasil', 'Anda berhasil menambahkan section baru!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        // dd($request->all());
        $sections = Section::findorFail($id);
        $data = $request->validate([
            'title' => 'string|required',
            'desc' => 'required',
            // 'image' => 'required'
        ],
        [
            'title.string' => 'Harus berupa string',
            'desc.required' => 'desc Wajib Diisi',
            // 'image.required' => 'Image Wajib Diisi'
        ]);

        $data['user_id'] = Auth::user()->id;
        // dd($request->image);
        // upload dan simpan gambar jika ada file yang diunggah
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('assets', 'public');
            $data['image'] = $image;
        } else {
            // Jika tidak ada file yang diunggah, gunakan nilai yang ada di database
            // $data['image'] = $sections->image;
            dd($request->image);
        }

        $sections->update($data);

        return redirect()->route('admin.section.index')->with('Tambah section berhasil', 'Anda berhasil menambahkan section baru!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section, $id)
    {
        $data = Section::findOrFail($id);
        // hapus data section
        $data->delete();

        return redirect()->route('admin.section.index')->with('Hapus section berhasil', 'Anda berhasil menghapus data section');
    }
}
