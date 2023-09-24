<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class ExportPeserta implements FromView, WithColumnWidths
{
    public function columnWidths(): array
    {
        return [
            'A' => 5,
            'B' => 30,
            'C' => 30,
            'D' => 30,
            'E' => 30,
            'F' => 30,
        ];
    }
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