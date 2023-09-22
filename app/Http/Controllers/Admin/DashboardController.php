<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Article;
use App\Models\Student;
use App\Models\Document;
use Illuminate\Http\Request;
use App\Charts\PendaftarChart;
use App\Http\Controllers\Controller;
use App\Models\Generasi;
use App\Models\Payment;
use Khill\Lavacharts\Lavacharts;

class DashboardController extends Controller
{
    public function index()
    {
        
        $users = User::where('role','user')->orderby('id','desc')->paginate(10);
        $student = User::whereHas('payment', function ($query) {
            $query->where('status', 'berhasil');
        })->get();;
        $uang = Payment::where('status','berhasil')->sum('amount');
        $lulus = User::where('status','Lulus')->where('role','user')->orderby('id','desc')->paginate(10);
        $informasi = Article::all();
        $generations = Generasi::where('status','on')->first();
        return view('pages.admin.dashboard.index',compact('users','informasi','student','lulus','generations','uang'));
    }
}
