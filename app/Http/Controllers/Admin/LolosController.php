<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
}
