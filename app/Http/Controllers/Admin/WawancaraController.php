<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Student;
use App\Models\Wawancara;
use Illuminate\Http\Request;
use App\Traits\Fonnte;
use App\Http\Controllers\Controller;

class WawancaraController extends Controller
{
    use Fonnte;
    public function index()
    {
        // $wawancara = Wawancara::with('student');
        $data = Student::where('status','Wawancara')->paginate(5);
        // $wawancara = Wawancara::find();
        return view('pages.admin.dashboard.wawancara.index',compact('data'));
    }

    public function store(Request $request)
    {
        $user = User::where('id',$request->id)->first();
        // $users = User::where('nomor',$request->id)->first();
        $notify = User::where('notify_id',$request->id)->first();
        $student = Student::find($request->id); // Mengambil objek Student berdasarkan ID
        $studentId = $student->id; // Mengambil ID dari objek Student

        $data = $request->validate([
            'tanggal' => 'required',
            'link' =>'required',
            'jam' => 'required'
        ]);
        $data['user_id'] = $user->id;
        $data['student_id'] = $studentId;

        $messages = $notify->notifys->notif_info;

        $this->send_message($user->nomor,$messages);
        Wawancara::create($data);
        // $wawancara = Wawancara::find($request->id);

        return redirect()->route('admin.wawancara.index');
    }

    public function update(Request $request, $id)
    {
        // Mencari data berdasarkan ID
        $wawancara = Wawancara::find($id);
        $notify = User::where('notify_id',1)->first();
        $student = Student::find($id);
        // $user = User::where('nomor',$student);
        // Menangani kasus jika data tidak ditemukan
        if (!$wawancara) {
            return abort(404); // atau respons lainnya
        }

        // Validasi data
        $data = $request->validate([
            'tanggal' => 'required',
            'link' => 'required',
            'jam' => 'required'
        ]);
        $data['user_id'] = $wawancara->user_id;
        $data['student_id'] = $wawancara->student_id;
        // Update data
        $messages = $notify->notifys->notif_info . $request->tanggal . ' Pada Jam : ' . $request->jam . ' Silahkan Akses Link berikut: ' . "<a href='$request->link'>" . '</a>';


        $this->send_message($student->user->nomor,$messages);
        $wawancara->update($data);

        return redirect()->route('admin.wawancara.index');
    }
}
