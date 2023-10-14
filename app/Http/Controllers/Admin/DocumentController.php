<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('search')){
            $document = Document::where('title','LIKE','%'.$request->search.'%')->paginate(5);
        }
        else{
            $document = Document::orderBy('id', 'desc')->get();
        }

        $user = User::whereHas('document')->with('document')->get();
        return view('pages.admin.dashboard.documents.index',compact('document','user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.dashboard.documents.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kk' => 'required|mimes:pdf|max:2048', // Kartu Keluarga
            'ijazah' => 'required|mimes:pdf|max:2048', // Ijazah
            'akta' => 'required|mimes:pdf|max:2048', // Akta
            'rapor' => 'required|mimes:pdf|max:2048'
        ]);
    
        if ($request->hasFile('kk') && $request->hasFile('ijazah') && $request->hasFile('akta') && $request->hasFile('rapor')) {
            $kkFile = $request->file('kk');
            $ijazahFile = $request->file('ijazah');
            $aktaFile = $request->file('akta');
            $raporFile = $request->file('akta');
    
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
            
            return redirect()->route('admin.document.index')->with('success', 'Document Baru Berhasil Di Tambahkan');
        }
    
        return redirect()->back()->with('error', 'Gagal mengunggah files.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $document = User::whereHas('document')->find($id);
        return view('pages.admin.dashboard.documents.show', compact('document'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        return view('pages.admin.dashboard.documents.edit',compact('document'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $document = Document::find($id);
        
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

        return redirect()->route('admin.document.index')->with('update',"Berhasil Mengupdate Document $document->user->name");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Document::findOrFail($id);

        $data->delete();

        return redirect()->route('admin.document.index')->with('delete','Berhasil Menghapus Document');
    }

    public function document()
    {
        return view('front.upload');
    }

    public function verify_process(Request $request, $id) 
    {
        $user = User::with('document')->find($id);

        $user->update([
            'status' => 'Wawancara',
        ]);

        return redirect()->route('admin.document.index')->with('verify','Dokumen berhasil diverifikasi');
    }

    public function unggah_document(Request $request)
    {
        $request->validate([
            'kk' => 'required|mimes:pdf|max:2048', // Kartu Keluarga
            'ijazah' => 'required|mimes:pdf|max:2048', // Ijazah
            'akta' => 'required|mimes:pdf|max:2048', // Akta
        ]);
    
        if ($request->hasFile('kk') && $request->hasFile('ijazah') && $request->hasFile('akta')) {
            $kkFile = $request->file('kk');
            $ijazahFile = $request->file('ijazah');
            $aktaFile = $request->file('akta');
    
            $kkFileName = time() . '_kk_' . $kkFile->getClientOriginalName();
            $ijazahFileName = time() . '_ijazah_' . $ijazahFile->getClientOriginalName();
            $aktaFileName = time() . '_akta_' . $aktaFile->getClientOriginalName();
    
            $kkFile->storeAs('public/pdf', $kkFileName);
            $ijazahFile->storeAs('public/pdf', $ijazahFileName);
            $aktaFile->storeAs('public/pdf', $aktaFileName);
            
            // Proses penyimpanan informasi ke database
            $data = [
                'kk' => 'pdf/' . $kkFileName,
                'ijazah' => 'pdf/' . $ijazahFileName,
                'akta' => 'pdf/' . $aktaFileName,
            ];
            
            $data['user_id'] = Auth::user()->id;
            
            Document::create($data);
    
            return redirect()->route('user.profile')->with('success', 'Files berhasil diunggah.');
        }
    
        return redirect()->back()->with('success', 'Gagal mengunggah files.');
    }
}
