<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('pages.admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ],
    [
        'email.required' => 'email Wajib Diisi',
        'password.required' => 'Password Wajib Diisi'
    ]);

    $infologin = [
        'email' => $request->email,
        'password' => $request->password
    ];

    if (Auth::attempt($infologin)) {
        if(auth()->user()->role == 'admin'){
            $request->session()->regenerate();
            return redirect()->route('admin.admin.dashboard');
        }else{
            return back()->withErrors([
                'email' => 'Kamu Bukan Admin'
            ])->onlyInput('email');
        }
    }
    return back()->withErrors([
        'email' => 'Email Anda Salah / Sudah Di Pakai',
        'password' => 'Password Salah'
    ])->onlyInput('email','password');
    }

    // public function show()
    // {
    //     return view('pages.user.register');
    // }

    // public function register(Request $request)
    // {
    //     $phone = $request->nomor;
    //     if (Str::startsWith($phone, '0')) {
    //         $phone = '62' . substr($phone, 1);
    //     }
    //     $existingUser = User::where('nomor', $phone)->first();
    //     if ($existingUser) {
    //         return redirect()->back()->withErrors(['nomor' => 'Nomor Sudah Di Pake Maybe']);
    //     }
    //         // dd($request->all());
    //     $messages = [
    //         'name.required' => 'Nama Lengkap Harus Diisi',
    //         'name.min' => 'Apakah Ini Nama Lengkap Dengan :min Doang?',
    //         'name.max' => 'Waduh Wir Nama Mu Panjang Amat',
    //         'name.string' => 'Nama Itu Harus Alfabet',
    //         'nomor.required' => 'Nomor Harus Diisi Dengan Benar',
    //         'nomor.unique' => 'Nomor Sudah Di Pake Maybe',
    //         'jenis_kelamin.required' => 'Jenis Kelamin Kamu Harus Diisi',
    //         'tanggal_lahir.required' => 'Tanggal Lahir Kamu Berapa?',
    //         'password.required' => 'Password Wajib Diisi',
    //         'password.same:password_again' => 'Password Harus Sama Dengan Confirm Password',
    //         'password_again.required' => 'Woi Isi Confirmasi Passwordnya',
    //         'password.min' => 'Password Minimal :min Angka/Huruf' 
    //     ];
    //     $data = $request->validate([
    //         'name' => 'required|min:3|max:255|string',
    //         'nomor' => 'required|min:10|unique:users,nomor',
    //         'jenis_kelamin' => 'required|string',
    //         'tanggal_lahir' => 'required|date',
    //         'password'       => 'required|min:6|same:password_again',
    //         'password_again' => 'required'
    //     ],$messages);
    //     $notify = Notify::firstOrFail(); // Mengambil entitas notifikasi pertama
    //     $data['notify_id'] = $notify->id;
    //     $data['password'] = bcrypt($request->password);
    //     $data['token'] = rand(111111,999999);
    //     $data['nomor'] = $phone;
        
    //     $user = User::create($data);
    
    //     $notif_otp = $notify->notif_otp;
    //     $messages = $notif_otp . $user->token;
            
    //     $this->send_message($user->nomor, $messages); 

    //     try{
    //         Auth::login($user);
    //         return redirect()->route('front');
    //     }catch (\Throwable $th){
    //         throw $th;
    //         return redirect()->withInput();
    //     }
    //     return back()->withInput();
    // }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.index')->with('success', 'Berhasil logout');
    }
}
