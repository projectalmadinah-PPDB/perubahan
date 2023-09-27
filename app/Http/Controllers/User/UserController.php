<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Notify;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Generasi;
use App\Traits\Fonnte;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    use Fonnte;
    public function __construct()
    {
        $this->middleware('guest', [
            'except' => [
                'logout',
                'verifyEmailProcess',
                'verifyEmailSuccess',
                'verifyEmail',
                'sendEmailVerification',
                'resendEmailVerification'
            ]
        ]);
    }

    public function sendEmailVerification()
    {
        try {
            $user = auth()->user();

            // if (RateLimiter::tooManyAttempts(auth()->user()->email, 3)){
            //     $seconds = RateLimiter::availableIn(auth()->user()->email);
            //     $second  = $seconds <= 60 ? $seconds.' detik' : ceil($seconds/60).' menit';
            //     return 'Anda sudah melakukan 6 kali percobaan silahkan tunggu '.$second.' lagi untuk mencoba kirim kembali';
            // }

            $token = Crypt::encrypt($user->password);

            $actionLink = route('user.verification.process', $token);
            $body = 'Silahkan Verifikasi Email anda dari website <strong>Finval</strong> akun dengan email <strong>'.$user->email.'</strong>, Verifikasi Email anda dengan mengklik link berikut';

            // RateLimiter::hit($user->email, 1800);

            Mail::send('email.email-verification', compact('body', 'actionLink'), function($message) use ($user) {
                // $message->from('finval@gmail.com');
                $message->to($user->email)
                        ->subject('Verifikasi Email');
            });

            RateLimiter::clear($user->email);

            return true;
        } catch (\Throwable $e) {
            return $e->getMessage();
        }
    }

    public function verifyEmailProcess($token)
    {
        $user            = auth()->user();
        $token_decrypted = Crypt::decryptString($token);

        if (explode('"', $token_decrypted)[1] != $user->password){
            return redirect()->route('user.verification')->with('error', 'Token tidak valid');
        }

        $user = User::findOrFail(auth()->user()->id);
        $user->update([
            "email_verified_at" => Date('Y-m-d'),
        ]);

        return redirect()->route('user.profile')->with('success','Anda Berhasil Masuk');
    }

    public function resendEmailVerification()
    {

        $is_send_email = $this->sendEmailVerification();

        if (gettype($is_send_email) == 'string'){
            $type    = 'error';
            $message = $is_send_email;
        }else {
            $type    = 'success';
            $message = 'Berhasil kirim email verifikasi';
        }

        $this->sendEmailVerification();
        return redirect()->route('user.verification')->with($type, $message);
    }

    public function verifyEmail()
    {
        return view('pages.user.email-verification');
    }
    public function index()
    {
        return view('front.login');
    }

    public function login(Request $request)
    {
        $phone = $request->nomor;
        if (Str::startsWith($phone, '0')) {
            $phone = '62' . substr($phone, 1);
        }
        $request->validate([
            'nomor' => 'required|exists:users,nomor',
            'password' => 'required'
        ]);
        $infologin = [
            'nomor' => $phone,
            'password' => $request->password
        ];

        $credentials = $request->only('nomor', 'password');
        $user = User::where('nomor',$credentials)->first();

        if(!$user->payment){
            $notif = User::find($user->id);
            $messages = $notif->notifys->notif_login . ' Silahkan Akses Link berikut: ' . "<a href='http://127.0.0.1:8000/user/dashboard'>" . '</a>';

            $this->send_message($phone,$messages);
        }elseif($user->payment->status == 'pending'){
            $notif = User::find($user->id);

            $messages = $notif->notifys->notif_login . $user->payment->link;

            $this->send_message($phone,$messages);
        }else{

        }
        if($user->active == 0){
            
            return redirect()->route('user.activication')->with('gagal','Kamu Harus Mengisi Kode OTP Yang Dikirim');
        }
        $authenticated = Auth::attempt($credentials, $request->has('remember'));

        if (!$authenticated){
            return redirect()->back()->with('error', 'email atau password salah.');
        }
        return redirect()->route('user.dashboard');


        $this->validate($request, [
            'nomor' => 'required',
            'password' => 'required',
        ]);
        
        if(auth()->attempt(array('nomor' => $input['nomor'], 'password' => $input['password'])))
        {
            if (auth()->user()->role == 'user') {
                $messages = $notif->notifys->notif_pembayaran;

                $this->send_message($phone,$messages);
                return redirect()->route('user.dashboard')->with('success','Yey Berhasil Login');
            }else{
                return redirect()->back()->withErrors([
                    'nomor' => 'Kamu bukan user'
                ]);
            }
        }else{
            return redirect()->route('login')
                ->with('error','Nomor And Password Are Wrong.');
        }
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
    $generasi = Generasi::where('status', 'on')
    ->orderBy('created_at', 'asc') // Mengurutkan berdasarkan waktu pendaftaran
    ->first();
    $data['generasi_id'] = $generasi->id;
    // dd($data);
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
        $user = User::where('token', $request->token)->first();
        $notif = User::where('notify_id',1)->first();

        if ($user) {
            $user->update([
                'active' => 1
            ]);

            // Setelah mengupdate status aktif, kita akan mencoba masuk
            auth()->login($user);
            $messages = $notif->notifys->notif_login;


            $this->send_message($user->nomor,$messages);
            return redirect()->route('user.dashboard');
        }

        return redirect()->back()->with('error', 'Token Tidak Sesuai');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('user.index')->with('success', 'Berhasil logout');
    }
}
