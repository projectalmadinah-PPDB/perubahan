<?php

namespace App\Http\Controllers\User;

use App\Models\Parents;
use App\Models\Student;
use App\Models\Document;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Generasi;
use App\Models\User;
use App\Traits\Fonnte;
use Illuminate\Support\Facades\Auth;

class LengkapiController extends Controller
{
    use Fonnte;
    public function index()
    {
        $generasi = Generasi::where('status','on')->get();
        return view('front.dashboard.pendaftaran',compact('generasi'));
    }

    public function store(Request $request)
    {
        $generasi_id = Generasi::where('status','on')->first();
        $notif = User::where('notify_id',1)->first();
        $user = Auth::user()->id;
        $userss = Auth::user();
        $users = User::where('nomor',$userss->nomor)->first();

        $student = $request->validate([
            'birthplace' => 'required',
            'nik' => 'required',
            'nisn' => 'required',
            'hobby' => 'required',
            'ambition' => 'required',
            'last_graduate' => 'required',
            'old_school' => 'required',
            'organization_exp' => 'required',
            'address' => 'required',
            'generasi_id' => 'required'
        ]);
        $student['user_id'] = $user;
        Student::create($student);

        $parent = $request->validate([
            'father_name' => 'required|string',
            'father_phone' => 'required',
            'father_job' => 'required',
            'mother_name' => 'required|string',
            'mother_phone' => 'required',
            'mother_job' => 'required',
            'parent_earning' => 'required|string',
            'no_of_sibling' => 'required|string',
            'child_no' => 'required|string'
        ]);
        $parent['user_id'] = $user;
        Parents::create($parent);

        $messages = $notif->notifys->notif_mengisi_pribadi;


        $this->send_message($users->nomor,$messages);
        
        return redirect()->route('user.document')->with('pribadi','Kamu Sudah Memasukkan Data Pribadi Dan Org Tua Selanjutnya Data Document');
    }

    public function document()
    {
        return view('front.dashboard.upload_document');
    }

    public function upload(Request $request)
    {
        $notif = User::where('notify_id',1)->first();
        $userss = Auth::user();
        $users = User::where('nomor',$userss->nomor)->first();
        $request->validate([
            'kk' => 'required|mimes:pdf|max:8192', // Kartu Keluarga
            'ijazah' => 'required|mimes:pdf|max:8192', // Ijazah
            'akta' => 'required|mimes:pdf|max:8192', // Akta
            'rapor' => 'required|mimes:pdf|max:8192', // lapor
        ]);
    
        if ($request->hasFile('kk') && $request->hasFile('ijazah') && $request->hasFile('akta') && $request->hasFile('rapor')) {
            $kkFile = $request->file('kk');
            $ijazahFile = $request->file('ijazah');
            $aktaFile = $request->file('akta');
            $raporFile = $request->file('rapor');
    
            $kkFileName = time() . '_kk_' . $kkFile->getClientOriginalName();
            $ijazahFileName = time() . '_ijazah_' . $ijazahFile->getClientOriginalName();
            $aktaFileName = time() . '_akta_' . $aktaFile->getClientOriginalName();
            $raporFileName = time() . '_rapor_' . $raporFile->getClientOriginalName();
    
            $kkFile->storeAs('public/pdf', $kkFileName);
            $ijazahFile->storeAs('public/pdf', $ijazahFileName);
            $aktaFile->storeAs('public/pdf', $aktaFileName);
            $raporFile->storeAs('public/pdf', $raporFileName);
    
            // Proses penyimpanan informasi ke database
            $data = [
                'kk' => 'pdf/' . $kkFileName,
                'ijazah' => 'pdf/' . $ijazahFileName,
                'akta' => 'pdf/' . $aktaFileName,
                'rapor' => 'pdf/' . $raporFileName,
            ];
            
            $data['user_id'] = Auth::user()->id;
            
            Document::create($data);

            $messages = $notif->notifys->notif_melengkapi;


            $this->send_message($users->nomor,$messages);
            
            return redirect()->route('user.dashboard')->with('lengkap', 'Semua Data Kamu Sudah Di Lengkapi');
        }
    
        return redirect()->route('user.dashboard')->with('error', 'Gagal mengunggah files.');
    }
}
