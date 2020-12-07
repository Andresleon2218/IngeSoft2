<?php

namespace App\Exports;

use App\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class DateExport implements FromCollection, WithHeadings
{

    public function headings(): array
    {
        return [
            'Fecha',
            'Hora de entrada',
            'Hora de salida',
            'Descripcion',
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $dates = DB::table('dates')->select('date','start', 'end', 'description')->where('client_id', Auth::user()->id)->get();
        return $dates;
    }
}
