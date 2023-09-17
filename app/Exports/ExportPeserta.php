<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class ExportPeserta implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $peserta = User::where('role','user')->with('student','document')->get();
    }
}
