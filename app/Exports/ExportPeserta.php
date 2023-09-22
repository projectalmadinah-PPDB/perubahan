<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ExportPeserta implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $data = User::whereHas('payment', function ($query) {
            $query->where('status', 'berhasil');
        })->get();
        return view('pages.admin.dashboard.peserta.table',compact('data'));
    }
}
