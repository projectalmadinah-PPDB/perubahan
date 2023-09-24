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
        return view('front.dashboard.index',compact('user','userId','informasi','announcements','users'));
    }

    public function coba()
    {
        $users = Auth::user()->id;
        $user = User::with('student')->findOrFail($users);
        $userId = Payment::where('user_id',$users)->get();
        $informasi = Article::all();
        return view('front.dashboard.coba',compact('user','informasi','userId'));
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

    public function pay($id)
    {
        $pendaftaran = User::find($id);
        $phone = User::where('nomor',$pendaftaran->nomor)->first();
        $status = 'pending';
        
        
        $payment = json_decode(json_encode($this->redirect_payment($id)),true);
        // dd($payment);
        $Transaction = Payment::create([
            'user_id' => $pendaftaran->id,
            'status' => 'pending',
            'no_invoice' => $payment['Data']['SessionID'],
            'link' => $payment['Data']['Url'],
            'amount' => 100000
        ]);
        if ($pendaftaran->payment->status == 'expired' && $pendaftaran->payment->no_invoice) {
            $pendaftaran->payment->status = $status;
            $pendaftaran->payment->save(); // Simpan perubahan status pembayaran
            return back();
        }
        $messages = $pendaftaran->notifys->notif_pembayaran . $Transaction->link;

        $this->send_message($phone,$messages);
        return Redirect::to($Transaction->link);
    }
}
