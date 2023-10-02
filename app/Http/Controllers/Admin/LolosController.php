<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ExportLulus;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Traits\Fonnte;

class LolosController extends Controller
{
    use Fonnte;
    public function index(Request $request)
    {
        if($request->has('search')){
            $lolos = User::where('role','user')->where('name','LIKE','%'.$request->search.'%')->paginate(5);
        }
        else{
            $lolos = User::where('status','Lulus')->orderBy('id','desc')->paginate(5);
        }
        
        return view('pages.admin.dashboard.lolos.index',compact('lolos'));
    }

    public function export()
    {
        return Excel::download(new ExportLulus, 'Lulus.xlsx');
    }

    public function pengecekan(Request $request,$id)
    {
        // dd($request->all());
        // $users = $id;
        $student = User::findOrFail($id);
        $notif = User::where('notify_id',1)->first();
        $data = $request->validate([
            'status' => 'required'
        ]);
        $student->update($data);
        if($student->status == 'Lulus'){

            $messages = $notif->notifys->notif_lolos;
    
            $this->send_message($student->nomor,$messages);
        }elseif($student->status == 'Gagal'){
            $messages = $notif->notifys->notif_gagal;

            $this->send_message($student->nomor,$messages);
        }
        else{
            $messages = $notif->notifys->notif_wawancara;

            $this->send_message($student->nomor,$messages);
        }
        return redirect()->route('admin.peserta.index');
    }

    public function update(Request $request,$id)
    {
        $lolos = User::where('status','Lulus')->findOrFail($id);
        $data = $request->validate([
            'status' => 'required'
        ]);
        $lolos->update($data);

        return redirect()->route('admin.lolos.index')->with('edit',"Berhasil Mengupdate Status Siswa");
    }

    public function destroy($id)
    {
        $delete = User::where('status', 'Lulus')->delete();
    
        return redirect()->route('admin.lolos.index');
    }

    public function edit_status(Request $request)
    {
        $status = $request->id;
        $student = User::where('status','Lulus')->findOrFail($status);
        return view('pages.admin.dashboard.lolos.edit-status',compact('student'));
    }

    public function editMassal(Request $request)
    {
        $status = $request->status; // Ambil nilai status dari input seleksi
        
        foreach ($request->ids as $key => $id) {
            $data = array(
                'status' => $status,
            );

            User::where('id', $id)
                ->update($data);
        }

        return redirect()->route('admin.lolos.index')->with('edit','Berhasil Mengedit Massal');
    }
    
}
