<?php

namespace App\Http\Controllers;

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
        $data = $request->validate([
            'title' => 'required|string',
            'image' => 'required',
            'desc' => 'required',
        ]);

        $data['user_id'] = Auth::user()->id;

        if($request->hasFile('image')){
            $image = $request->file('image')->store('assets', 'public');
            $data['image'] = $image;
        } else {
            $data['image'] = $home->image;
        }

        $home->update($data);

        return redirect()->route('admin.section.index')->with('Update hero section berhasil', 'Anda berhasil mengubah Hero Section Homepage!');
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
        $data = $request->validate([
            'title' => 'string',
            'desc' => '',
            'image' => 'required|image',
        ],
        [
            'title.string' => 'Harus berupa string',
            'image.required' => 'Gambar Wajib Diisi',
        ]);

        $data['user_id'] = Auth::user()->id;

        // upload dan simpan gambar
        if($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('assets', 'public');
            $data['image'] = $imagePath;
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
    public function update(Request $request, Section $section)
    {
        $data = $request->validate([
            'title' => 'string',
            'desc' => '',
            'image' => 'required|image',
        ],
        [
            'title.string' => 'Harus berupa string',
            'image.required' => 'Gambar Wajib Diisi',
        ]);

        $data['user_id'] = Auth::user()->id;

        // upload dan simpan gambar
        if($request->image) {
            $imagePath = $request->file('image')->store('assets', 'public');
            $data['image'] = $imagePath;
        } else {
            $data['image'] = $section->image;
        }

        $section->update($data);

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
