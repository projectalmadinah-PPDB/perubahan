<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class ExportLulus implements FromView, WithColumnWidths
{
    public function columnWidths(): array
    {
        return [
            'A' => 5,
            'B' => 30,
            'C' => 30,
            'D' => 30,
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $data = User::where('status','Lulus')->get();
        return view('pages.admin.dashboard.lolos.table',compact('data'));
    }
}
