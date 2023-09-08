<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Traits\Ipaymu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{
    use Ipaymu;
    public function index()
    {
        $users = Auth::user()->id;
        $user = User::with('student')->findOrFail($users);
        $informasi = Article::all();
        return view('front.dashboard.index',compact('user','informasi'));
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
        $video = User::find($id);

        $payment = json_decode(json_encode($this->redirect_payment($id)),true);

        // dd($payment);

        $Transaction = Payment::create([
            'user_id' => Auth::user()->id,
            'status' => 'pending',
            'no_invoice' => $payment['Data']['SessionID'],
            'link' => $payment['Data']['Url'],
            'amount' => 100000
        ]);
        return Redirect::to($Transaction->link);
    }
}
