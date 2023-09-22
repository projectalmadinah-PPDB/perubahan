<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function notify(Request $request)
    {
        $sid = $request->sid;
        $status = $request->status;
        $transaction = Payment::where('no_invoice',$sid)->first();
        
        if($status == 'berhasil'){
            $transaction->status = $status;
            $transaction->update();
            return redirect()->route('callback.return')->with('success','Berhasil Membayar Biaya');
        }else{
            return view('front.callback.return-cancel')->with('success','Gagal Membayar Biaya');
        }
    }
}
