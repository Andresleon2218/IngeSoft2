<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Models\Specialty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfessionalRequest;

class ProfessionalController extends Controller
{

    public function __construct() {
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
        $proRole = Role::where('key','pro')->first();
        $professionals = User::where('role_id',$proRole->id)->paginate(10);
        return view('admin.professional.index',compact('professionals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specialties = Specialty::orderBy('created_at','desc')->get();
        return view('admin.professional.create',compact('specialties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfessionalRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $user = new User($data);
        $proRole = Role::where('key','pro')->first();
        $user->role()->associate($proRole);
        $user->save();
        $user->specialties()->sync($data['specialties']);
        return redirect()->route('professional.index')->with('success','Profesional registrado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $professional)
    {
        if ($professional->role->key != 'pro')
            return redirect()->route('professional.index');
        return view('admin.professional.show',compact('professional'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return redirect()->route('professional.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        return redirect()->route('professional.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $professional)
    {
        if ($professional->role->key != 'pro')
            return redirect()->route('professional.index');
        $professional->update(['active' => false]);
        return redirect()->route('professional.index')->with('success','Profesional desactivado con éxito');
    }
}
