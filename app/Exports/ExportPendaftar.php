<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
class ExportPendaftar implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $users = User::where('role','user')->with('student','document','payment')->get();
        return view('pages.admin.dashboard.pendaftar.table',compact('users'));
    }
}
