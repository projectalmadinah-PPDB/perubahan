<?php

namespace App\Exports;

use App\Models\Generasi;
use App\Models\Student;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ExportLaporan implements FromView
{
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
        $users = User::where('generasi_id', $data)->get();
        
        // dd($users);
        // Mengirim data pengguna ke tampilan
        return view('pages.admin.dashboard.laporan.table', compact('users'));
    }
}
