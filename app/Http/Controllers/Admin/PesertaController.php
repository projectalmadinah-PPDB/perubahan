<?php

namespace App\Http\Controllers\Admin;

// use App\Models\User;
// use App\Http\Middleware\User;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PesertaController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('search')){
            $data = User::where('name','LIKE','%'.$request->search.'%')->paginate(5);
        }
        else{
            $data = User::where('role','user')->orderBy('id','desc')->with('student','document')->whereHas('student')->paginate(5);
        }
        return view('pages.admin.dashboard.peserta.index',compact('data'));
    }

    public function show($id){
        // $pendaftaran = User::with('student')->findOrFail($id);
        $pendaftaran = User::with('parents')->findOrFail($id);

        return view('pages.admin.dashboard.data.show',compact('pendaftaran'));
    }

    public function edit($id)
    {
        $data = User::with('student','document')->findOrFail($id);

        return view('pages.admin.dashboard.data.edit',compact('data'));
    }

    public function update(Request $request,$id)
    {
        $phone = $request->nomor;
        if (Str::startsWith($phone, '0')) {
            $phone = '62' . substr($phone, 1);
        }
        $user = User::find($id);
        $parents = $user->parents; // Tidak perlu tanda kurung
        $student = $user->student;
        $data = $request->validate([
            'name' => 'required|string',
            'nomor' => 'required|unique:users,nomor,' . $user->id,
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $user->update($data);
        $students = $request->validate([
            'birthplace' => 'required|string',
            'nik' => 'required|string',
            'nisn' => 'required|string',
            'hobby' => 'required|string',
            'ambition' => 'required',
            'last_graduate' => 'required',
            'old_school' => 'required',
            'organization_exp' => 'required',
            'address' => 'required',
            'status' => 'required'
        ]);
        $student->update($students);
        $parent = $request->validate([
            'father_name' => 'required|string',
            'father_phone' => 'required',
            'father_job' => 'required|string',
            'mother_name' => 'required',
            'mother_phone' => 'required',
            'mother_job' => 'required',
            'parent_earning' => 'required',
            'child_no' => 'required',
            'no_of_sibling' => 'required',
            'status' => 'required'
        ]);

        $parents->update($parent);

        $document = $user->document;

        $document_validate = $request->validate([
            'nik' => 'required',
            'kk' => 'required',
            'ijazah' => 'required',
            'rapor' => 'required'
        ]);
        // Update document files if uploaded
        if ($request->hasFile('kk')) {
            $kkFile = $request->file('kk');
            $kkFileName = time() . '_kk_' . $kkFile->getClientOriginalName();
            $kkFile->storeAs('public/pdf', $kkFileName);
            $document->kk = 'pdf/' . $kkFileName;
        }
        if ($request->hasFile('ijazah')) {
            $ijazahFile = $request->file('ijazah');
            $ijazahFileName = time() . '_ijazah_' . $ijazahFile->getClientOriginalName();
            $ijazahFile->storeAs('public/pdf', $ijazahFileName);
            $document->ijazah = 'pdf/' . $ijazahFileName;
        }
        if ($request->hasFile('akta')) {
            $aktaFile = $request->file('akta');
            $aktaFileName = time() . '_akta_' . $aktaFile->getClientOriginalName();
            $aktaFile->storeAs('public/pdf', $aktaFileName);
            $document->akta = 'pdf/' . $aktaFileName;
        }
        if ($request->hasFile('rapor')) {
            $raporFile = $request->file('rapor');
            $raporFileName = time() . '_rapor_' . $raporFile->getClientOriginalName();
            $raporFile->storeAs('public/pdf', $raporFileName);
            $document->akta = 'pdf/' . $raporFileName;
        }
        $document->update($document_validate);
        return redirect()->route('admin.pendaftaran.index')->with('edit',"Data Pendaftaran Sudah Di Ganti");
        
        // return redirect()->route('admin.pendaftaran.index')->with('edit',"Data Pendaftaran Sudah Di Ganti");
    }
}
