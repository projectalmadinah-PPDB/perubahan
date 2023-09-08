<?php

namespace App\Http\Middleware;

use App\Models\Payment as ModelsPayment;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Payment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        $payment = ModelsPayment::where('user_id', $user->id)->first();

        if ($payment && $payment->status == 'berhasil') {
            return $next($request);
        }
        
        return redirect()->route('user.dashboard')->with('error','Anda Belum Melakukan Pembayaran Silahkan Membayar Agar Data Anda Dapat Di Proses');
    }
}
