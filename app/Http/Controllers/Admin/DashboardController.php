<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Document;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

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
