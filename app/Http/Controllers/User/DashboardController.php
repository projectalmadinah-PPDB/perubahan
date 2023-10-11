<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Traits\Fonnte;
use App\Traits\Ipaymu;
use App\Models\Article;
use App\Models\Payment;
use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{
    use Fonnte;
    use Ipaymu;
    public function index()
    {
        $users = Auth::user()->id;
        $user = User::with('student')->findOrFail($users);
        $userId = Payment::where('user_id',$users)->get();
        $informasi = Article::all();
        $announcements = Announcement::get();
        $pengumuman_pembayaran = Announcement::where('step','Pembayaran')->get();
        $pengumuman_data = Announcement::where('step','Data')->get();
        $pengumuman_test = Announcement::where('step','Test')->get();
        $pengumuman_hasil = Announcement::where('step','Hasil')->get();
        return view('front.dashboard.index',compact('user','userId','informasi','announcements','users','pengumuman_pembayaran','pengumuman_test','pengumuman_hasil','pengumuman_data'));
    }

    public function coba()
    {
        $users = Auth::user()->id;
        $user = User::with('student')->findOrFail($users);
        $userId = Payment::where('user_id',$users)->get();
        $informasi = Article::all();
        $announcements = Announcement::get();
        return view('front.dashboard.coba',compact('user','informasi','userId','announcements'));
    }

    public function profile()
    {
        $users = Auth::user()->id;
        $user = User::with('parents')->findOrFail($users);
        return view('front.dashboard.profile',compact('user'));
    }

    public function informasi()
    {
        $users = Auth::user()->id;
        $user = User::with('parents')->findOrFail($users);
        $article = Article::all();
        return view('front.dashboard.informasi',compact('article','user'));
    }
    
    public function qna()
    {
        $users = Auth::user()->id;
        $user = User::with('parents')->findOrFail($users);
        $question = Question::all();
        return view('front.dashboard.qna',compact('question','user'));
    }
    
    public function payment_detail()
    {
        $user = Auth::user();
        $payment = Payment::where('user_id', $user->id)->first();

        // return view('front.dashboard.payment', compact('user','payment'));
        return Redirect::to($payment->link);
    }

    public function pay($id)
    {
        $user = User::find($id);
        // dd($user);
        $phone = User::where('nomor',$user->nomor)->first();
        $status = 'pending';
        
        $createPayment = json_decode(json_encode($this->redirect_payment($id)),true);
        // dd($createPayment);
        $Transaction = Payment::create([
            'user_id' => $user->id,
            'status' => 'pending',
            'no_invoice' => $createPayment['Data']['SessionID'],
            'link' => $createPayment['Data']['Url'],
            'amount' => 100000
        ]);
        if ($user->payment->status == 'expired' && $user->payment->no_invoice) {
            $user->payment->status = $status;
            $user->payment->save(); // Simpan perubahan status pembayaran
            return back();
        }
        $messages = $user->notifys->notif_pembayaran . ' ' . $Transaction->link;

        $payment = Payment::where('user_id', $user->id)->first();

        $this->send_message($phone,$messages);
        // return Redirect::to($Transaction->link);
        return view('front.dashboard.payment', compact('user','payment'));
    }
}
