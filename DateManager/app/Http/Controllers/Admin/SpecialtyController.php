<?php

namespace App\Http\Controllers\Admin;

use App\Models\Specialty;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Http\Requests\SpecialtyRequest;
use Illuminate\Support\Facades\Validator;

class SpecialtyController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialties = Specialty::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.specialty.index',compact('specialties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.specialty.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SpecialtyRequest $request)
    {
        Validator::make($request->validated(),[
            'name' => Rule::unique('specialties')
        ])->validate();
        Specialty::create($request->validated());
        return redirect()->route('specialty.index')->with('success','Especialidad creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Specialty $specialty)
    {
        return view('admin.specialty.show',compact('specialty'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Specialty $specialty)
    {
        return view('admin.specialty.edit',compact('specialty'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SpecialtyRequest $request, Specialty $specialty)
    {
        Validator::make($request->validated(),[
            'name' => Rule::unique('specialties')->ignore($specialty)
        ])->validate();
        $specialty->update($request->validated());
        return redirect()->route('specialty.index')->with('success','Especialidad actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specialty $specialty)
    {
        $specialty->update(['active'=>false]);
        return redirect()->route('specialty.index')->with('success','Especialidad desactivada con éxito');
    }
}
