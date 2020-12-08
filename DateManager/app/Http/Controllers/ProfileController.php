<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function show() {
        return view('profile.show');
    }

    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request)
    {
        $user = User::where('id',Auth::user()->id)->first();
        $user->update($request->validated());
        return redirect(route('profile'))->with('success','User updated succesfully');
    }

    /**
     * Remove the account.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $user = User::where('id',Auth::user()->id)->first();
        $user->update(['active' => false]);
        Auth::logout();
        return redirect(route('welcome'));
    }
}
