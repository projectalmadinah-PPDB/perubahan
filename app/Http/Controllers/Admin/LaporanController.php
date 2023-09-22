<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $data = User::where('role','user')->orderby('id','desc')->paginate(5);
        $payment = Payment::orderby('id','desc')->paginate(5);
        return view('pages.admin.dashboard.laporan.index',compact('data','payment'));
    }
}
