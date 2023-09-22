<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PenggunaController extends Controller
{
    
    public function admins()
    {
        $users = User::orderby('active',0)->where('role', 'admin')->paginate(10);
        return view('pages.admin.dashboard.pengguna.admin', compact('users'));
    }
    
    public function pesertas(Request $request)
    {
        if($request->has('select')){
            $users = User::where('active','LIKE','%'.$request->select.'%')->orderby('id','asc')->where('role', 'user')->paginate(10);
        }else{
            $users = User::orderby('id','asc')->where('role', 'user')->paginate(10);
        }
        return view('pages.admin.dashboard.pengguna.index', compact('users'));
    }

    public function create_users()
    {
        return view('pages.admin.dashboard.pengguna.create');
    }

    public function create_users_process(Request $request)
    {
    $phone = $request->nomor;
    if (Str::startsWith($phone, '0')) {
        $phone = '62' . substr($phone, 1);
    }
    $existingUser = User::where('nomor', $phone)->first();
    if ($existingUser) {
        return redirect()->back()->withErrors(['nomor' => 'Nomor Sudah Di Pake Maybe']);
    }
    
    $messages = [
        'name.required' => 'Nama Lengkap Harus Diisi',
        'name.min' => 'Apakah Ini Nama Lengkap Dengan :min Doang?',
        'name.max' => 'Waduh Wir Nama Mu Panjang Amat',
        'name.string' => 'Nama Itu Harus Alfabet',
        'email.required' => 'Email Harus Diisi Dengan Benar',
        'email.unique' => 'Email Sudah Di Pake Maybe',
        'nomor.required' => 'Nomor Harus Diisi Dengan Benar',
        'nomor.unique' => 'Nomor Sudah Di Pake Maybe',
        'jenis_kelamin.required' => 'Jenis Kelamin Kamu Harus Diisi',
        'tanggal_lahir.required' => 'Tanggal Lahir Kamu Berapa?',
        'password.required' => 'Password Wajib Diisi',
        'password.min' => 'Password Minimal :min Angka/Huruf',
        'role.required' => 'Role harap dipilih'
    ];
    $data = $request->validate([
        'name' => 'required|min:3|max:255|string',
        'nomor' => 'required|string|unique:users,nomor',
        'email' => 'required|email|unique:users,email',
        'jenis_kelamin' => 'required|string',
        'tanggal_lahir' => 'required|date',
        'password'       => 'required|min:6',
        'role' => 'required|string'
    ], $messages);

    $data['password'] = bcrypt($request->password);
    $data['token'] = rand(111111,999999);
    $data['nomor'] = $phone;
    $data['active'] = 1;
    
    $user = User::create($data);  
     
    return redirect()->route('admin.users.index');
    }

    public function update_users(Request $request, $id)
    {
    $user = User::find($id);

    $phone = $request->nomor;
    if (Str::startsWith($phone, '0')) {
        $phone = '62' . substr($phone, 1);
    }
    
    $messages = [
        'name.required' => 'Nama Lengkap Harus Diisi',
        'name.min' => 'Apakah Ini Nama Lengkap Dengan :min Doang?',
        'name.max' => 'Waduh Wir Nama Mu Panjang Amat',
        'name.string' => 'Nama Itu Harus Alfabet',
        'email.required' => 'Email Harus Diisi Dengan Benar',
        'email.unique' => 'Email Sudah Di Pake Maybe',
        'nomor.required' => 'Nomor Harus Diisi Dengan Benar',
        'nomor.unique' => 'Nomor Sudah Di Pake Maybe',
        'jenis_kelamin.required' => 'Jenis Kelamin Kamu Harus Diisi',
        'tanggal_lahir.required' => 'Tanggal Lahir Kamu Berapa?',
        'password.required' => 'Password Wajib Diisi',
        'password.min' => 'Password Minimal :min Angka/Huruf',
        'role.required' => 'Role harap dipilih'
    ];
    $data = $request->validate([
        'name' => 'required|min:3|max:255|string',
        'nomor' => 'required|unique:users,nomor,' . $user->id,
        'email' => 'required|email|unique:users,email,' . $user->id,
        'jenis_kelamin' => 'required|string',
        'tanggal_lahir' => 'required|date',
        'role' => 'required|string'
    ], $messages);

    if ($request->password) {
        $data['password'] = bcrypt($request->password);
    } else {
        $data['password'] = $user->password;
    }

    if ($request->password) {
        $data['nomor'] = $phone;
    } else {
        $data['nomor'] = $user->nomor;
    }

    $data['token'] = rand(111111,999999);
    $data['active'] = 1;

    $user->update($data);
    
    return back()->with('edit' , 'Data user Berhasil Di update');
    }

    public function update_active(Request $request, $id)
    {
        $user = User::find($id);

        if ($request->active !== 'on') {
            $activeMsg = 'User Berhasil Diaktifkan';
            $activeStatus = 1;
        } else {
            $activeMsg = 'User Berhasil Dinonaktifkan';
            $activeStatus = 0;
        }

        // dd($activeStatus);

        $user->update(['active' => $activeStatus]);


        return redirect()->route('admin.users.users')->with('active', $activeMsg);
    }

    public function delete_users($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('delete' , 'Data user Berhasil Di hapus');
    }

}
