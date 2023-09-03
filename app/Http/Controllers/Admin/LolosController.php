<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LolosController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('search')){
            $lolos = User::where('role','user')->where('name','LIKE','%'.$request->search.'%')->paginate(5);
        }
        else{
            $lolos = Student::where('status','lolos')->orderBy('id','desc')->paginate(5);
        }
        
        return view('pages.admin.dashboard.lolos.index',compact('lolos'));
    }

    public function pengecekan(Request $request,$id)
    {
        // dd($request->all());
        $notif = User::where('notify_id',$id)->first();
        $student = Student::find($id);
        $data = $request->validate([
            'status' => 'required|in:lolos,gagal'
        ]);
        $student->update($data);
        if($student->status == 'lolos'){

            $messages = $notif->notifys->notif_lolos;
    
            $this->send_message($student->user->nomor,$messages);
        }else{
            $messages = $notif->notifys->gagal;

            $this->send_message($student->user->nomor,$messages);
        }
        return redirect()->route('admin.pendaftaran.index');
    }

    public function update(Request $request,$id)
    {
        $lolos = Student::where('status','lolos')->findOrFail($id);
        $data = $request->validate([
            'status' => 'required'
        ]);
        $lolos->update($data);

        return redirect()->route('admin.lolos.index')->with('edit',"Berhasil Mengupdate Status Siswa");
    }

    public function destroy($id)
    {
        $delete = Student::where('status', 'lolos')->delete();
    
        return redirect()->route('admin.lolos.index');
    }
}
