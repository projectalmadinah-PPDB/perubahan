<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Generasi;
use Illuminate\Http\Request;

class GenerasiController extends Controller
{
    public function index()
    {
        $generasi = Generasi::get();
        return view('pages.admin.dashboard.generasi.index',compact('generasi'));
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'generasi' => 'required',
            'start_at' => 'required',
            'end_at' => 'required'
        ]);
        $data['status'] = 'on';

        Generasi::create($data);

        return redirect()->route('admin.generasi.index')->with('success','Berhasil Menambahkan Generasi Baru ');
    }

    public function update(Request $request,$id)
    {
        $generasi = Generasi::find($id);
        $data = $request->validate([
            'generasi' => 'required',
            'start_at' => 'required',
            'end_at' => 'required'
        ]);

        $generasi->update($data);

        return redirect()->route('admin.generasi.index')->with('edit','Berhasil Mengupdate Data Generasi');
    }

    public function status(Request $request,$id)
    {
        $generasi = Generasi::find($id);
        $data = $request->validate([
            'status' => 'required'
        ]);

        $generasi->update($data);

        return redirect()->route('admin.generasi.index')->with('success','Berhasil Mengganti Status Generasi');
    }
}
