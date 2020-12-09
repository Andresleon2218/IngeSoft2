<?php

namespace App\Http\Controllers\User;

use App\Models\Date;
use App\Models\User;
use App\Models\Schedule;
use App\Models\Specialty;
use App\Exports\DateExport;
use Illuminate\Support\Carbon;
use App\Http\Requests\DateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Pagination\LengthAwarePaginator;

class DateController extends Controller
{

    public function __construct() {
        $this->middleware(['auth','verified']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dates = Auth::user()->dates;
        $dates = new LengthAwarePaginator($dates,$dates->count(),10);
        return view('user.date.index',compact('dates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Specialty $specialty,User $professional,Schedule $schedule)
    {
        return view('user.date.create',compact('specialty','professional','schedule'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DateRequest $request)
    {
        $data = $request->validated();
        $schedule = Schedule::where('id',$data['schedule'])->first();
        $startDate = Carbon::createFromFormat('Y-m-d',$schedule->start_date);
        $endDate = Carbon::createFromFormat('Y-m-d',$schedule->end_date);
        $date = Carbon::createFromFormat('Y-m-d',$data['date']);
        if ($date < $startDate || $date > $endDate) {
            return back()->with('error','La fecha seleccionada para la cita no está dentro del rango de las fechas del horario seleccionado');
        }
        $dayOfDate = $date->englishDayOfWeek;
        if ($dayOfDate == 'Monday') {
            if (!$schedule->monday) {
                return back()->with('error','El profesional no atiende los lunes en el horario seleccionado');
            }
        } elseif ($dayOfDate == 'Tuesday') {
            if (!$schedule->tuesday) {
                return back()->with('error','El profesional no atiende los martes en el horario seleccionado');
            }
        } elseif ($dayOfDate == 'Wednesday') {
            if (!$schedule->wednesday) {
                return back()->with('error','El profesional no atiende los miércoles en el horario seleccionado');
            }
        } elseif ($dayOfDate == 'Thursday') {
            if (!$schedule->thursday) {
                return back()->with('error','El profesional no atiende los jueves en el horario seleccionado');
            }
        } elseif ($dayOfDate == 'Friday') {
            if (!$schedule->friday) {
                return back()->with('error','El profesional no atiende los viernes en el horario seleccionado');
            }
        } elseif ($dayOfDate == 'Saturday') {
            if (!$schedule->saturday) {
                return back()->with('error','El profesional no atiende los sábados en el horario seleccionado');
            }
        } elseif ($dayOfDate == 'Sunday') {
            if (!$schedule->sunday) {
                return back()->with('error','El profesional no atiende los domingos en el horario seleccionado');
            }
        }
        $time = Carbon::createFromFormat('H:i',$data['start']);
        $startTime = Carbon::createFromFormat('H:i',$schedule->start_time);
        $endTime = Carbon::createFromFormat('H:i',$schedule->end_time);
        if ($time < $startTime || $time > $endTime) {
            return back()->with('error','La hora seleccionada para la cita no está dentro del rango de las horas del horario seleccionado');
        }
        $time->addHours($schedule->duration_date);
        if ($time > $endTime) {
            return back()->with('error','La hora seleccionada para la cita no se alcanza a atender dentro del rango de las horas del horario seleccionado');
        }
        $data['end'] = $time->hour.':'.$time->minute;
        $date = new Date($data);
        $date->schedule()->associate($schedule);
        $date->client()->associate(Auth::user());
        $date->save();
        return redirect()->route('date.index')->with('success','Cita agendada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Date  $date
     * @return \Illuminate\Http\Response
     */
    public function show(Date $date)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Date  $date
     * @return \Illuminate\Http\Response
     */
    public function edit(Date $date)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Date  $date
     * @return \Illuminate\Http\Response
     */
    public function update(DateRequest $request, Date $date)
    {
        $date->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Date  $date
     * @return \Illuminate\Http\Response
     */
    public function destroy(Date $date)
    {
        $date->update(['active' => false]);
    }

    public function export()
    {
        return Excel::download(new DateExport, 'citas.xlsx');
    }
}
