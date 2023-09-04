<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Article;
use App\Models\Student;
use App\Models\Document;
use Illuminate\Http\Request;
use App\Charts\PendaftarChart;
use App\Http\Controllers\Controller;
use Khill\Lavacharts\Lavacharts;

class DashboardController extends Controller
{
    public function index()
    {
        
        $users = User::where('role','user')->get();
        $student = Student::all();
        $document = Document::all();
        $informasi = Article::all();
        return view('pages.admin.dashboard.index',compact('users','informasi','student','document'));
    }
}
