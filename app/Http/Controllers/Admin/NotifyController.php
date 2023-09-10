<?php

namespace App\Http\Controllers\Admin;

use App\Models\Notify;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotifyController extends Controller
{
    public function index()
    {
        $notif = Notify::first();
        return view('pages.admin.dashboard.setting.notify',compact('notif'));
    }

    public function update(Request $request)
    {
        $notify = Notify::first();
        $notifys = $request->validate([
            'notif_otp' => 'required',
            'notif_lolos' =>'required',
            'notif_gagal' => 'required',
            'notif_pembayaran' => 'required',
            'notif_info' => 'required',
            'notif_wawancara' => 'required',
            'notif_verify' => 'required',
            'notif_belum_verify' => 'required',
            'notif_tidak_sah' => 'required',
            'notif_gagal_otp' => 'required'
        ]);

        $notify->update($notifys);

        return redirect()->route('admin.setting.notify.index');
    }
}
