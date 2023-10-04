<?php

namespace App\Http\Controllers\Admin;
 
use App\Models\User;
use App\Models\Student;
use App\Models\Document;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Exports\ExportPeserta;
use App\Http\Controllers\Controller;
use App\Traits\Fonnte;
use Maatwebsite\Excel\Facades\Excel;

class PesertaController extends Controller
{
    use Fonnte;
    public function index(Request $request)
    {
        $data = User::whereHas('payment', function ($query) {
            $query->where('status', 'berhasil');
        })->orderBy('id','desc')->paginate(5);
        
        return view('pages.admin.dashboard.peserta.index',compact('data'));
    }

    public function export_data()
    {
        $data = User::all();
        return Excel::download(new ExportPeserta($data), 'peserta.xlsx');
    }


    public function show($id){
        $pendaftaran = User::with('student')->findOrFail($id);
    
        return view('pages.admin.dashboard.peserta.show', compact('pendaftaran'));
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

    return redirect()->route('admin.peserta.index')->with('edit', 'Data Pendaftar Berhasil Di Edit');
    }

    public function coba(Request $request)
    {
        $status = $request->id;
        $student = User::whereHas('payment')->findOrFail($status);
        return view('pages.admin.dashboard.peserta.edit-coba',compact('student'));
    }

    public function cobaUpdate(Request $request)
    {
        $status = $request->status; // Ambil nilai status dari input seleksi
        $selectedIds = $request->input('ids'); // Ambil ID yang dipilih

        foreach ($selectedIds as $id) {
            $data = array(
                'status' => $status,
            );

            User::where('id', $id)
                ->update($data);

            $notif = User::find($id);

            $messages = $notif->notifys->notif_info . $notif->payment->link;
    
            $this->send_message($notif->nomor,$messages);
        }

        return redirect()->route('admin.peserta.index')->with('edit_massal', 'Berhasil Mengedit Massal');
    }

    public function destroy($id)
    {     
        // Hapus user
        $user = User::findOrFail($id);

        $user->document()->delete();
        
        $user->payment()->delete();

        $user->student()->delete();

        $user->delete();

        return redirect()->route('admin.peserta.index')->with('delete',"Berhasil Menghapus Pendaftaran $user->name");
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
