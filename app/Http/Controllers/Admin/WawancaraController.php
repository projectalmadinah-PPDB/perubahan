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
    public function index(Request $request)
    {
        // $wawancara = Wawancara::with('student');
        $data = User::where('status','Wawancara')->get();
        
        return view('pages.admin.dashboard.wawancara.index',compact('data'));
    }

    public function create($id)
    {
        $wawancara = User::find($id);
        return view('pages.admin.dashboard.wawancara.create',compact('wawancara'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $user = User::where('id',$request->id)->first();
        // $users = User::where('nomor',$request->id)->first();
        $notify = User::where('notify_id',1)->first();
        $student = User::find($request->id); // Mengambil objek Student berdasarkan ID

        $data = $request->validate([
            'tanggal' => 'required',
            'link' =>'required',
            'jam' => 'required'
        ]);
        $data['user_id'] = $user->id;

        Wawancara::create($data);
        $messages = $notify->notifys->notif_wawancara . $request->tanggal . ' Pada Jam : ' . $request->jam . ' Silahkan Akses Link berikut: ' . $request->link;

        $this->send_message($user->nomor,$messages);
        // $wawancara = Wawancara::find($request->id);

        return redirect()->route('admin.wawancara.index')->with('success','Berhasil Menambahkan Jadwal Dan Link Wawancara');
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
        $messages = $notify->notifys->notif_wawancara . $request->tanggal . ' Pada Jam : ' . $request->jam . ' Silahkan Akses Link berikut: ' . "<a href='$request->link'>" . '</a>';


        $this->send_message($student->user->nomor,$messages);
        $wawancara->update($data);

        return redirect()->route('admin.wawancara.index')->with('edit','Berhasil Edit Waktu Wawancara Dan Link');
    }

    public function edit_massal(Request $request)
    {
        $status = $request->id;
        $student = User::where('status','Wawancara')->findOrFail($status);
        return view('pages.admin.dashboard.wawancara.edit-status',compact('student'));
    }

    public function editStatus(Request $request)
    {
        $status = $request->status; // Ambil nilai status dari input seleksi
        
        foreach ($request->ids as $key => $id) {
            $data = array(
                'status' => $status,
            );

            User::where('id', $id)
                ->update($data);
        }

        return redirect()->route('admin.wawancara.index')->with('edit_massal','Berhasil Mengedit Massal');
    }

    public function store_massal(Request $request)
    {
        // Validasi data yang dikirimkan melalui formulir
    $validatedData = $request->validate([
        'tanggal.*' => 'required|date',
        'jam.*' => 'required|date_format:H:i',
        'link.*' => 'required|url',
    ]);

    // Loop melalui data yang dikirimkan dari formulir
    foreach ($validatedData['tanggal'] as $index => $tanggal) {
        $wawancara = new Wawancara();
        $wawancara->tanggal = $tanggal;
        $wawancara->jam = $validatedData['jam'][$index];
        $wawancara->link = $validatedData['link'][$index];
        // Tambahkan pengguna ID atau informasi lain yang diperlukan
        // $wawancara->user_id = ...
        $wawancara->save();
    }

    // Redirect atau kirim respons sesuai kebutuhan
    return redirect()->route('admin.wawancara.index')->with('success', 'Data Wawancara massal berhasil disimpan.');
    }

    public function updateStatus(Request $request,$id)
    {
        $lolos = User::where('status','Wawancara')->findOrFail($id);
        $data = $request->validate([
            'status' => 'required'
        ]);
        $lolos->update($data);

        return redirect()->route('admin.lolos.index')->with('edit',"Berhasil Mengupdate Status Siswa");
    }
}
