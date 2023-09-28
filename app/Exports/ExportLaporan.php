<?php

namespace App\Exports;

use App\Models\Generasi;
use App\Models\Student;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class ExportLaporan implements FromView,WithColumnWidths
{
    public function columnWidths(): array
    {
        return [
            'A' => 5,
            'B' => 15,
            'C' => 15,
            'D' => 15,
            'E' => 15,
            'F' => 15,
            'G' => 15,
            'H' => 15,
            'I' => 15,
            'J' => 30,
            'K' => 15,
            'L' => 15,
            'M' => 30,
            'N' => 30,
            'O' => 15,
            'P' => 15,
            'Q' => 15,
            'R' => 15,
            'S' => 15,
            'T' => 15,
            'U' => 15,
            'V' => 5,
            'W' => 5,
            'X' => 15,
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
    public function view(): View
    {
        $data = $this->data;
        // $users = User::whereHas('student','parents','payment')->where('generasi_id', $data)->get();
        $users = User::where('generasi_id', $data)->get();

        
        // dd($users);
        // Mengirim data pengguna ke tampilan
        return view('pages.admin.dashboard.laporan.table', compact('users'));
    }
}
