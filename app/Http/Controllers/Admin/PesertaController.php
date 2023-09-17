<?php

namespace App\Http\Controllers\Admin;

// use App\Models\User;
// use App\Http\Middleware\User;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Student;

class PesertaController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('search')){
            $data = User::where('name','LIKE','%'.$request->search.'%')->where('role','user')->paginate(5);
        }
        else{
            $data = User::where('role','user')->paginate(5);
        }
        return view('pages.admin.dashboard.peserta.index',compact('data'));
    }

    public function show($id){
        // $pendaftaran = User::with('student')->findOrFail($id);
        $pendaftaran = Student::findOrFail($id);

        return view('pages.admin.dashboard.peserta.show',compact('pendaftaran'));
    }

    public function document($id)
    {
        $document = Document::findOrFail($id);

        return view('pages.admin.dashboard.peserta.show_document',compact('document'));
    }

    public function edit($id)
    {
        $data = User::with('student','document')->findOrFail($id);

        return view('pages.admin.dashboard.peserta.edit',compact('data'));
    }

    public function update(Request $request,$id)
    {
        // dd($request->all());
        $phone = $request->nomor;
        if (Str::startsWith($phone, '0')) {
            $phone = '62' . substr($phone, 1);
        }
        $user = User::findorFail($id);
        $parents = $user->parents; // Tidak perlu tanda kurung
        $student = $user->student;
        $data = $request->validate([
            'name' => 'required|string',
            'nomor' => 'required|unique:users,nomor,' . $user->id,
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
        ]);
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
        ]);
        $document = $user->document;

        // $document_validate = $request->validate([
        //     'kk' => 'required',
        //     'ijazah' => 'required',
        //     'rapor' => 'required',
        //     'akta' => 'required'
        // ]);
        // // Update document files if uploaded
        // if ($request->hasFile('kk')) {
        //     $kkFile = $request->file('kk');
        //     $kkFileName = time() . '_kk_' . $kkFile->getClientOriginalName();
        //     $kkFile->storeAs('public/pdf', $kkFileName);
        //     $document->kk = 'pdf/' . $kkFileName;
        // }
        // if ($request->hasFile('ijazah')) {
        //     $ijazahFile = $request->file('ijazah');
        //     $ijazahFileName = time() . '_ijazah_' . $ijazahFile->getClientOriginalName();
        //     $ijazahFile->storeAs('public/pdf', $ijazahFileName);
        //     $document->ijazah = 'pdf/' . $ijazahFileName;
        // }
        // if ($request->hasFile('akta')) {
        //     $aktaFile = $request->file('akta');
        //     $aktaFileName = time() . '_akta_' . $aktaFile->getClientOriginalName();
        //     $aktaFile->storeAs('public/pdf', $aktaFileName);
        //     $document->akta = 'pdf/' . $aktaFileName;
        // }
        // if ($request->hasFile('rapor')) {
        //     $raporFile = $request->file('rapor');
        //     $raporFileName = time() . '_rapor_' . $raporFile->getClientOriginalName();
        //     $raporFile->storeAs('public/pdf', $raporFileName);
        //     $document->akta = 'pdf/' . $raporFileName;
        // }
        $user->update($data);
        $parents->update($parent);
        // $document->update($document_validate);
        return redirect()->route('admin.peserta.index')->with('edit',"Data Pendaftaran Sudah Di Ganti");
        
        // return redirect()->route('admin.pendaftaran.index')->with('edit',"Data Pendaftaran Sudah Di Ganti");
    }

    public function coba(Request $request)
    {
        $status = $request->id;
        $student = User::findOrFail($status);
        return view('pages.admin.dashboard.peserta.edit-coba',compact('student'));
    }

    public function cobaUpdate(Request $request)
    {
        foreach($request->ids as $key => $value){
            $data = array(
                'status' => $request->status[$key],
            );
            User::where('id',$request->ids[$key])
            ->update($data);
        }
        return redirect()->route('admin.peserta.index');
    }

    public function delete_all(Request $request)
{
    $userIds = $request->id; // Jika Anda menerima lebih dari satu ID, pastikan $request->id adalah array

    
    // Loop melalui setiap ID pengguna
    foreach ($userIds as $userId) {
        $user = User::find($userId);

        // Hapus semua entri terkait dalam tabel `document`
        $user->document()->delete();

        // Hapus semua entri terkait dalam tabel `payment`
        $user->payment()->delete();

        // Hapus entri terkait dalam tabel `student`
        $user->student()->delete();

        // Hapus pengguna itu sendiri
        $user->delete();
    }

    return redirect()->route('admin.peserta.index');
}


}
