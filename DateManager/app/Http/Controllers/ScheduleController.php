<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ScheduleRequest;

class ScheduleController extends Controller
{

    public function __construct() {
        $this->middleware(['auth','verified','professional']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $schedules = Schedule::where('professional_id',$userId)->paginate(10);
        return view('schedule.index',compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('schedule.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ScheduleRequest $request)
    {
        $data = $request->validated();
        // --------- Verificación del solapamiento de horarios ----------
        $startDate = Carbon::createFromFormat('Y-m-d',$data['start_date']);
        $endDate = Carbon::createFromFormat('Y-m-d',$data['end_date']);
        $startTime = Carbon::createFromFormat('H:i',$data['start_time']);
        $endTime = Carbon::createFromFormat('H:i',$data['end_time']);
        foreach(Auth::user()->schedules as $currentSchedule) {
            $currentStartDate = Carbon::createFromFormat('Y-m-d',$currentSchedule->start_date);
            $currentEndDate = Carbon::createFromFormat('Y-m-d',$currentSchedule->end_date);
            $currentStartTime = Carbon::createFromFormat('H:i:s',$currentSchedule->start_time);
            $currentEndTime = Carbon::createFromFormat('H:i:s',$currentSchedule->end_time);
            // El rango de fechas del nuevo horario se solapa con el de los ya existentes.
            if (($startDate >= $currentStartDate && $startDate <= $currentEndDate)
                || ($endDate >= $currentStartDate && $endDate <= $currentEndDate) ) {
                // Los días del nuevo horario se solapa con el de los ya existentes.
                if ($this->containsCommonDays($data['days'],$currentSchedule)) {
                    // Las horas de atención se solapa con las ya existentes.
                    if (($startTime >= $currentStartTime && $startTime <= $currentEndTime)
                        || ($endTime >= $currentStartTime && $endTime <= $currentEndTime)) {
                        return back()->with('error','El horario se solapa con uno ya existente');
                    }
                }
            }
        }
        // ----------- Fin de la verificación del solapamiento de horarios ----------------
        foreach ($data['days'] as $day) {
            $data[$day] = true;
        }
        unset($data['days']);
        if ($data['duration_of_date'] == null) {
            unset($data['duration_of_date']);
        }
        $schedule = new Schedule($data);
        $schedule->professional()->associate(Auth::user());
        $schedule->save();
        return redirect(route('schedule.index'))->with('success','Horario registrado con éxito');
    }

    private function containsCommonDays($days,$date) {
        foreach($days as $day) {
            if ($day == 'monday' && $date->monday == true) {
                return true;
            }
            elseif ($day == 'tuesday' && $date->tuesday == true) {
                return true;
            }
            elseif ($day == 'wednesday' && $date->wednesday == true) {
                return true;
            }
            elseif ($day == 'thursday' && $date->thursday == true) {
                return true;
            }
            elseif ($day == 'friday' && $date->friday == true) {
                return true;
            }
            elseif ($day == 'saturday' && $date->saturday == true) {
                return true;
            }
            elseif ($day == 'sunday' && $date->sunday == true) {
                return true;
            }
        }
        return false;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        return view('schedule.show',compact('schedule'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        return view('schedule.edit', compact('schedule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(ScheduleRequest $request, Schedule $schedule)
    {
        $data = $request->validated();
        // --------- Verificación del solapamiento de horarios ----------
        $startDate = Carbon::createFromFormat('Y-m-d',$data['start_date']);
        $endDate = Carbon::createFromFormat('Y-m-d',$data['end_date']);
        $startTime = Carbon::createFromFormat('H:i',$data['start_time']);
        $endTime = Carbon::createFromFormat('H:i',$data['end_time']);
        foreach(Auth::user()->schedules as $currentSchedule) {
            if ($currentSchedule->id != $schedule->id) {
                $currentStartDate = Carbon::createFromFormat('Y-m-d',$currentSchedule->start_date);
                $currentEndDate = Carbon::createFromFormat('Y-m-d',$currentSchedule->end_date);
                $currentStartTime = Carbon::createFromFormat('H:i:s',$currentSchedule->start_time);
                $currentEndTime = Carbon::createFromFormat('H:i:s',$currentSchedule->end_time);
                // El rango de fechas del nuevo horario se solapa con el de los ya existentes.
                if (($startDate >= $currentStartDate && $startDate <= $currentEndDate)
                    || ($endDate >= $currentStartDate && $endDate <= $currentEndDate) ) {
                    // Los días del nuevo horario se solapa con el de los ya existentes.
                    if ($this->containsCommonDays($data['days'],$currentSchedule)) {
                        // Las horas de atención se solapa con las ya existentes.
                        if (($startTime >= $currentStartTime && $startTime <= $currentEndTime)
                            || ($endTime >= $currentStartTime && $endTime <= $currentEndTime)) {
                            return back()->with('error','El horario se solapa con uno ya existente');
                        }
                    }
                }
            }
        }
        // ----------- Fin de la verificación del solapamiento de horarios ----------------
        foreach ($data['days'] as $day) {
            $data[$day] = true;
        }
        unset($data['days']);
        if ($data['duration_of_date'] == null) {
            unset($data['duration_of_date']);
        }
        $schedule->update($data);
        return redirect(route('schedule.index'))->with('success','Horario actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->update(['active' => false]);
        return redirect(route('schedule.index'))->with('success','Horario desactivado');
    }
}
