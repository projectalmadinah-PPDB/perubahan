<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = Announcement::paginate(5);
        return view('pages.admin.dashboard.pengumuman.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.dashboard.pengumuman.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'            => 'string|required',
            'desc'             => 'required'
        ],[
            'title.required'   => 'Judul Pengumuman wajib diisi',
            'desc.required' => 'Deskripsi wajib diisi'
        ]);
        
        $data['user_id'] = Auth::user()->id;

        Announcement::create($data);

        return redirect()->route('admin.pengumuman.index')->with('success', 'Pengumuman berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Announcement::find($id);

        return view('pages.admin.dashboard.pengumuman.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Announcement $announcement, $id)
    {
        $announcement = Announcement::findOrFail($id);
        $data = $request->validate([
            'title'            => 'string|required',
            'desc'             => 'required'
        ],[
            'title.required'   => 'Judul Pengumuman wajib diisi',
            'desc.required' => 'Deskripsi wajib diisi'
        ]);

        $data['user_id'] = Auth::user()->id;

        $announcement->update($data);

        return redirect()->route('admin.pengumuman.index', compact('id'))->with('success', 'Pengumuman berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Announcement::findOrFail($id);

        $data->delete();
        return redirect()->route('admin.pengumuman.index')->with('delete', 'data pengumuman berhasil dihapus');
    }
}
