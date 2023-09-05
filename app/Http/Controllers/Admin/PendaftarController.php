<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Dotenv\Util\Str;
use App\Models\Document;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Traits\Fonnte;

class PendaftarController extends Controller
{
    use Fonnte;
    public function index(Request $request)
    {
        if($request->has('search')){
            $users = User::where('role','user')->where('name','LIKE','%'.$request->search.'%')->paginate(5);
        }
        else{
            $users = User::where('role','user')->orderBy('id','desc')->with('student','document')->paginate(5);
        }
        return view('pages.admin.dashboard.pendaftar.index',compact('users'));
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

    public function update(Request $request,$id)
    {
        $user = User::find($id);
        $pendaftaran = $user->student; // Tidak perlu tanda kurung

        $data = $request->validate([
            'name' => 'required|string',
            'nomor' => 'required|unique:users,nomor,' . $user->id,
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            // 'status' => 'required'
        ]);

        $user->update($data);
        return redirect()->route('admin.pendaftar.index')->with('edit', 'Profile berhasil diupdate.');
        $pendaftaranData = $request->validate([
            'nik' => 'required',
            'nama_ayah' => 'required|string',
            'no_ayah' => 'required',
            'nama_ibu' => 'required|string',
            'no_ibu' => 'required',
            'alamat' => 'required'
        ]);

        $pendaftaran->update($pendaftaranData);
        return redirect()->route('admin.pendaftar.index')->with('edit', 'Profile berhasil diupdate.');
        $document = $user->document;
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
        $document->save();


        return redirect()->route('admin.pendaftar.index')->with('edit', 'Profile berhasil diupdate.');
    }

    public function create()
    {
        return view('pages.admin.dashboard.pendaftar.create');
    }

    public function verify(Request $request,$id)
    {
        $user = User::where('id',$id);
        // $notify = User::where('notify_id',$user)->first();
        $data = $request->validate([
            'status' => 'required'
        ]);
        $user->update($data);
        $notify = User::find($id);
        if($notify->status == 'Verifikasi'){

            $messages = $notify->notifys->notif_verify;
    
            $this->send_message($notify->nomor,$messages);
        }elseif($notify->status == 'Belum'){

            $messages = $notify->notifys->notif_belum_verify;

            $this->send_message($notify->nomor,$messages);
        }
        else{
            $messages = $notify->notifys->notif_tidak_sah;

            $this->send_message($notify->nomor,$messages);
        }
        
        return redirect()->route('admin.pendaftar.index');
    }

    // public function store(Request $request)
    // {
    //     $phone = $request->nomor;
    //     if (Str::startsWith($phone, '0')) {
    //         $phone = '62' . substr($phone, 1);
    //     }
    //     $data = $request->validate([
    //         'name' => 'required|string',
    //         'nomor' => 'required',
    //         'password' => 'required',
    //         'tanggal_lahir' => 'required',
    //         'jenis_kelamin' => 'required'
    //     ]);
    //     $data['password'] = bcrypt($request->password);
    //     $data['token'] = rand(111111,999999);
    //     $data['nomor'] = $phone;
        
    //     $user = User::create($data);

    //     $messages = "Akun Kamu Di Buatkan Oleh Admin Ini Kode Kamu Jika Ingin Melanjutkan Pendaftaran $user->token";

    //     $this->send_message($user->nomor,$messages);

    //     // $pendaftaran = $request->validate([
    //     //     'nik' => 'required',
    //     //     'nama_ayah' => 'required',
    //     //     'no_ayah' => 'required',
    //     //     'nama_ibu' => 'required',
    //     //     'no_ibu' => 'required',
    //     //     'alamat' => 'required'
    //     // ]);
    //     // $pendaftaran['user_id'] = Auth::user()->id;
    //     // Pendaftaran::create($pendaftaran);

    //     // $request->validate([
    //     //     'kk' => 'required|mimes:pdf|max:2048', // Kartu Keluarga
    //     //     'ijazah' => 'required|mimes:pdf|max:2048', // Ijazah
    //     //     'akta' => 'required|mimes:pdf|max:2048', // Akta
    //     // ]);
    
    //     // if ($request->hasFile('kk') && $request->hasFile('ijazah') && $request->hasFile('akta')) {
    //     //     $kkFile = $request->file('kk');
    //     //     $ijazahFile = $request->file('ijazah');
    //     //     $aktaFile = $request->file('akta');
    
    //     //     $kkFileName = time() . '_kk_' . $kkFile->getClientOriginalName();
    //     //     $ijazahFileName = time() . '_ijazah_' . $ijazahFile->getClientOriginalName();
    //     //     $aktaFileName = time() . '_akta_' . $aktaFile->getClientOriginalName();
    
    //     //     $kkFile->storeAs('public/pdf', $kkFileName);
    //     //     $ijazahFile->storeAs('public/pdf', $ijazahFileName);
    //     //     $aktaFile->storeAs('public/pdf', $aktaFileName);
    
    //     //     // Proses penyimpanan informasi ke database
    //     //     $data = [
    //     //         'kk' => 'pdf/' . $kkFileName,
    //     //         'ijazah' => 'pdf/' . $ijazahFileName,
    //     //         'akta' => 'pdf/' . $aktaFileName,
    //     //     ];
            
    //     //     $data['user_id'] = Auth::user()->id;
            
    //     //     Document::create($data);

    //         return redirect()->route('admin.biodata.index')->with('success','Berhasil Menambahkan Pendaftaran');
    // }

    public function destroy($id)
    {     
        // Hapus user
        $user = User::findOrFail($id);

        $user->document()->delete();
        
        $user->pendaftaran()->delete();

        $user->delete();

        return redirect()->route('admin.biodata.index')->with('delete',"Berhasil Menghapus Pendaftaran $user->name");
    }
}
