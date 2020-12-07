<?php

namespace App\Exports;

use App\Schedule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ScheduleExport implements FromCollection, WithHeadings
{

    public function headings(): array
    {
        return [
            'Fecha inicio',
            'Fecha termino',
            'Hora de entrada',
            'Hora de salida',
            'Duración de cita',
            'Lunes',
            'Martes',
            'Miercoles',
            'Jueves',
            'Viernes',
            'Sabado',
            'Domingo',
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $schedules = DB::table('schedules')->select('start_date','end_date', 'start_time', 'end_time', 'duration_of_date', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday')->where('professional_id', Auth::user()->id)->get();
        return $schedules;
    }
}
