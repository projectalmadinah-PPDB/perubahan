<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ExportLaporan;
use App\Models\User;
use App\Traits\Fonnte;
use App\Models\General;
use App\Models\Document;
use Illuminate\Http\Request;
use App\Exports\ExportPendaftar;
use App\Exports\ExportPrivate;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\Generasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;

class PendaftarController extends Controller
{
    use Fonnte;
    public function index(Request $request)
    {
        $users = User::where('role','user')->orderBy('id','desc')->with('student','document','payment')->get();
        $generasi = Generasi::get();

        return view('pages.admin.dashboard.pendaftar.index',compact('users','generasi'));
    }

    public function export(Request $request)
    {
        $idAngkatan = $request->input('filterExport');
        // dd($request);
        if ($idAngkatan == 'all') {
            return Excel::download(new ExportPendaftar,"Pendaftar.xlsx");
        } else {
            $generasi = Generasi::where('id', $idAngkatan)->first();
            return Excel::download(new ExportLaporan($generasi->id), "Pendaftar Tahun Ajaran $generasi->generasi.xlsx");
        }
    }

    public function export_private($id)
    {
        $logo = General::first();
        $user = User::findOrFail($id);
        $pdf = Pdf::loadView('pages.admin.dashboard.pendaftar.table_private', compact('user','logo'));
        return $pdf->download("data-pribadi-$user->name.pdf");
        // return Excel::download(new ExportPrivate($user),"Data.$user->name.xlsx");
    }

    public function download_pdf_ijazah(Request $request ,$id)
    {
        $data = Document::where('user_id',$id)->first();
        $path = public_path('/storage/'.$data->ijazah);
        if(file_exists($path)){
            return response()->download($path);
        }
    }

    public function download_pdf_akta(Request $request ,$id)
    {
        $data = Document::where('user_id',$id)->first();
        $path = public_path('/storage/'.$data->akta);
        if(file_exists($path)){
            return response()->download($path);
        }
    }

    public function download_pdf_kk(Request $request ,$id)
    {
        $data = Document::where('user_id',$id)->first();
        $path = public_path('/storage/'.$data->kk);
        if(file_exists($path)){
            return response()->download($path);
        }
    }

    public function download_pdf_rapor(Request $request ,$id)
    {
        $data = Document::where('user_id',$id)->first();
        $path = public_path('/storage/'.$data->rapor);
        if(file_exists($path)){
            return response()->download($path);
        }
    }

    public function show($id){
        // $pendaftaran = User::with('student')->findOrFail($id);
        $pendaftaran = User::with('parents')->findOrFail($id);

        return view('pages.admin.dashboard.pendaftar.show',compact('pendaftaran'));
    }

    public function show_document($id)
    {
        $document = Document::with('user')->findOrFail($id);
        return view('pages.admin.dashboard.pendaftar.show_document',compact('document'));
    }

    public function edit($id)
    {
        $biodata = User::with('student','document')->findOrFail($id);
        return view('pages.admin.dashboard.pendaftar.edit',compact('biodata'));
    }
    
    public function update(Request $request, $id)
    {
        // Mengambil data pendaftar yang ingin diubah
        $user = User::findOrFail($id);

        // Memeriksa apakah ada file yang diunggah untuk setiap jenis dokumen dan hanya mengunggah jika ada
        if ($request->hasFile('kk')) {
            // Upload dan ganti file Kartu Keluarga jika ada yang diunggah
            $kkFile = $request->file('kk');
            $kkFileName = time() . '_kk_' . $kkFile->getClientOriginalName();
            $kkFile->storeAs('public/pdf', $kkFileName);
            $user->document->kk = 'pdf/' . $kkFileName;
        }

        if ($request->hasFile('ijazah')) {
            // Upload dan ganti file Ijazah jika ada yang diunggah
            $ijazahFile = $request->file('ijazah');
            $ijazahFileName = time() . '_ijazah_' . $ijazahFile->getClientOriginalName();
            $ijazahFile->storeAs('public/pdf', $ijazahFileName);
            $user->document->ijazah = 'pdf/' . $ijazahFileName;
        }

        if ($request->hasFile('akta')) {
            // Upload dan ganti file Akta jika ada yang diunggah
            $aktaFile = $request->file('akta');
            $aktaFileName = time() . '_akta_' . $aktaFile->getClientOriginalName();
            $aktaFile->storeAs('public/pdf', $aktaFileName);
            $user->document->akta = 'pdf/' . $aktaFileName;
        }

        if ($request->hasFile('rapor')) {
            // Upload dan ganti file Rapor jika ada yang diunggah
            $raporFile = $request->file('rapor');
            $raporFileName = time() . '_rapor_' . $raporFile->getClientOriginalName();
            $raporFile->storeAs('public/pdf', $raporFileName);
            $user->document->rapor = 'pdf/' . $raporFileName;
        }

        // Validasi data pribadi
        $data = $request->validate([
            'name' => 'required|string|max:255',
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
        ]);

        $parent = $request->validate([
            'father_name' => 'required|string|max:255',
            'father_phone' => 'required',
            'father_job' => 'required|string',
            'mother_name' => 'required|max:255',
            'mother_phone' => 'required',
            'mother_job' => 'required',
            'parent_earning' => 'required',
            'child_no' => 'required',
            'no_of_sibling' => 'required',
        ]);

        // Perbarui data pribadi
        $user->update($data);
        $user->student->update($students);
        $user->parents->update($parent);

        // Perbarui data dokumen
        $user->document->save();

        return redirect()->route('admin.pendaftar.index')->with('edit', 'Data Pendaftar Berhasil Di Edit');
    }

    
    public function create()
    {
        return view('pages.admin.dashboard.pendaftar.create');
    }

    public function destroy($id)
    {     
        // Hapus user
        $user = User::findOrFail($id);

        $user->document()->delete();
        
        $user->payment()->delete();

        $user->student()->delete();

        $user->delete();

        return redirect()->route('admin.pendaftar.index')->with('delete',"Berhasil Menghapus Pendaftaran $user->name");
    }

    public function destroyAll(Request $request)
    {
        if($request->id){
            foreach($request->id as $key => $value){
                $user = User::find($key);
                $user->student()->delete();
                $user->payment()->delete();
                $user->document()->delete();
                $user->delete();
            }
        }

        return redirect()->route('admin.pendaftar.index')->with('success', count($request->id) . ' users and related data deleted.');
    }

}
