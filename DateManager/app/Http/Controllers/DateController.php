<?php

namespace App\Http\Controllers;

use App\Models\Date;
use App\Models\User;
use App\Http\Requests\DateRequest;
use Illuminate\Support\Facades\Auth;

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
        $userId = Auth::user()->id;
        $dates = Date::where('professional_id',$userId)->orWhere('client_id',$userId)->paginate(10);
        return $dates;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('date.create');
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
        $professional = User::find($data['professional_id']);
        // Day of the week index: 1 => Monday, 2 => Tuesday, ...
        //$dateDate = Carbon;
        // Filter the professional's schedules according to the date
        //foreach ($professional->schedules as $schedule) {
        //    if ($schedule->start_date )
        //}

        $date = new Date($data);
        $date->professional()->associate($professional);
        $date->client()->associate(Auth::user());
        $date->save();
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
}
