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
        $chart = Payment::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
                ->whereYear('created_at',date('Y'))
                ->groupBy('month')
                ->orderBy('month')
                ->get();

        $labels = [];
        $data = [];
        $colors = ['#FF6969','#FF6969','#FF6969','#FF6969','#FF6969','#FF6969',];

        for($i=1; $i < 12; $i++){
            $month = date('F',mktime(0,0,0,$i,1));
            $count = 0;

            foreach($chart as $user){
                if($user->month == $i){
                    $count = $user->count;
                    break;
                }
            }

            array_push($labels,$month);
            array_push($data,$count);
        }

        $datasets = [
           [
                'label' => 'Uang Pendaftaran',
                'data' => $data,
                'backgroundColor' => $colors
           ]
        ];
        return view('pages.admin.dashboard.index',compact('users','informasi','student','lulus','generations','uang','datasets','labels'));
    }
}
