<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Traits\Fonnte;
use App\Traits\Ipaymu;
use App\Models\Article;
use App\Models\Payment;
use App\Http\Controllers\Controller;
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
        return view('front.dashboard.index',compact('user','informasi','userId'));
    }

    public function profile()
    {
        $users = Auth::user()->id;
        $user = User::with('parents')->findOrFail($users);
        return view('front.dashboard.profile',compact('user'));
    }

    public function informasi()
    {
        $article = Article::all();
        return view('front.dashboard.informasi',compact('article'));
    }

    public function pay($id)
    {
        $pendaftaran = User::find($id);
        $phone = User::where('nomor',$pendaftaran->nomor)->first();

        $payment = json_decode(json_encode($this->redirect_payment($id)),true);
        // dd($payment);
        $Transaction = Payment::create([
            'user_id' => $pendaftaran->id,
            'status' => 'pending',
            'no_invoice' => $payment['Data']['SessionID'],
            'link' => $payment['Data']['Url'],
            'amount' => 100000
        ]);
        $messages = $pendaftaran->notifys->notif_pembayaran.$Transaction->link;

        $this->send_message($phone,$messages);
        return Redirect::to($Transaction->link);
    }
}
