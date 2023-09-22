<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportLulus implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $data = User::where('status','Lulus')->get();
        return view('pages.admin.dashboard.lolos.table',compact('data'));
    }
}
