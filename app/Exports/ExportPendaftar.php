<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class ExportPendaftar implements FromView, WithColumnWidths
{
    public function columnWidths(): array
    {
        return [
            'A' => 5,
            'B' => 30,
            'C' => 30,
            'D' => 30,
            'E' => 30,
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $users = User::where('role','user')->with('student','document','payment')->get();
        return view('pages.admin.dashboard.pendaftar.table',compact('users'));
    }
}
