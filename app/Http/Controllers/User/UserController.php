<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Notify;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\Fonnte;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    use Fonnte;
    public function login()
    {
        return view('front.login');
    }

    public function loginProses(Request $request)
    {
        $phone = $request->nomor;
        if (Str::startsWith($phone, '0')) {
            $phone = '62' . substr($phone, 1);
        }
        $messages = [
            'nomor.required' => 'Nomor Harus Diisi Dengan Benar',
            'nomor.string' => 'Nomor Harus String',
            'password.required' => 'Password Wajib Diisi',
            'password.min' => 'Password Minimal :min Angka/Huruf' 
        ];
        $request->validate([
            'nomor' => 'required|string',
            'password' => 'required|min:8'
        ],$messages);

    $infologin = [
        'nomor' => $phone,
        'password' => $request->password
    ];
    $user = User::where('nomor', $phone)->first();

    if (!$user) {
        // Pengguna dengan nomor telepon tertentu tidak ditemukan
        return redirect()->route('user.login')->with('gagal', 'Nomor Anda tidak ditemukan.');
    }
    
    $notif = User::find($user->id);
    
    if ($user->active == 0) {
        return redirect()->route('user.activication')->with('gagal', 'Kamu Harus Mengisi Kode OTP Yang Dikirim');
    }
    if (Auth::attempt($infologin)) {
        if(auth()->user()->role == 'user'){
            $request->session()->regenerate();
            
            $messages = $notif->notifys->notif_pembayaran;

            $this->send_message($phone,$messages);
            return redirect()->route('user.dashboard')->with('success','Yey Berhasil Login');
        }else{ 
            return back()->withErrors([
                'nomor' => 'Kamu Bukan User'
            ])->onlyInput('nomor');
        }
        if(auth()->user()->role == 'user'){
            $request->session()->regenerate();
            return redirect()->route('user.dashboard');
        }else{
            return back()->withErrors([
                'nomor' => 'Kamu Bukan User'
            ])->onlyInput('nomor');
        }
    }
    return back()->withErrors([
        'nomor' => 'Nomor Anda Salah / Sudah Di Pakai',
        'password' => 'Password Salah'
    ])->onlyInput('nomor','password');
    }

    public function show()
    {
        return view('front.register');
    }

    public function registerProcess(Request $request)
    {
    $phone = $request->nomor;
    if (Str::startsWith($phone, '0')) {
        $phone = '62' . substr($phone, 1);
    }
    $existingUser = User::where('nomor', $phone)->first();
    if ($existingUser) {
        return redirect()->back()->withErrors(['nomor' => 'Nomor Sudah Di Pake Maybe']);
    }
        // dd($request->all());
    $messages = [
        'name.required' => 'Nama Lengkap Harus Diisi',
        'name.min' => 'Apakah Ini Nama Lengkap Dengan :min Doang?',
        'name.max' => 'Waduh Wir Nama Mu Panjang Amat',
        'name.string' => 'Nama Itu Harus Alfabet',
        'nomor.required' => 'Nomor Harus Diisi Dengan Benar',
        'nomor.unique' => 'Nomor Sudah Di Pake Maybe',
        'jenis_kelamin.required' => 'Jenis Kelamin Kamu Harus Diisi',
        'tanggal_lahir.required' => 'Tanggal Lahir Kamu Berapa?',
        'password.required' => 'Password Wajib Diisi',
        'password.same:password_again' => 'Password Harus Sama Dengan Confirm Password',
        'password_again.required' => 'Woi Isi Confirmasi Passwordnya',
        'password.min' => 'Password Minimal :min Angka/Huruf' 
    ];
    $data = $request->validate([
        'name' => 'required|min:3|max:255|string',
        'nomor' => 'required|min:10|unique:users,nomor',
        'jenis_kelamin' => 'required|string',
        'tanggal_lahir' => 'required|date',
        'password'       => 'required|min:6|same:password_again',
        'password_again' => 'required'
    ],$messages);
    $notify = Notify::firstOrFail(); // Mengambil entitas notifikasi pertama
    $data['notify_id'] = $notify->id;
    $data['password'] = bcrypt($request->password);
    $data['token'] = rand(111111,999999);
    $data['nomor'] = $request->nomor;
    
    $user = User::create($data);

    $notif_otp = $notify->notif_otp;
    $messages = $notif_otp . $user->token;
        
    $this->send_message($user->nomor, $messages);    
     
    return redirect()->route('user.activication')->with('success','Kode Otp Telah Di Kirim Di Nomor Whatshapp');
    }

    public function activication()
    {
        return view('front.token');
    }

    public function activication_process(Request $request)
    {
        $user = User::where('token',$request->token)->first();

        if($user){
            $user->update([
                'active' => 1
            ]);
            return redirect()->route('user.index')->with('success' ,'Yey Token Berhasil Di Masukkan');
        }
        return redirect()->back()->with('error','Token Tidak Sesuai');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('user.index')->with('success', 'Berhasil logout');
    }
}
