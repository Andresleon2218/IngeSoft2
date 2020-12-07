<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Exports\ProExport;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserPost;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'admin']);
       // $this->middleware('client')->only(['store', 'showClient', 'editClient', 'update', 'destroy']);
      //  $this->middleware('pro')->only(['store', 'showPro', 'editPro', 'update', 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexClients()
    {
        $role = Role::where('key', 'client')->first();
        $clients = User::where('role_id', $role->id)->paginate(5);
        return view('dashboard.client.index', ['clients'=>$clients]);
    }

    public function indexPro()
    {
        $role = Role::where('key', 'pro')->first();
        $pros = User::where('role_id', $role->id)->paginate(5);
        return view('dashboard.pro.index', ['pros'=>$pros]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPro()
    {
        return view('dashboard.pro.create', ["pro" => new User()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create($request->validated());
        return back()->with('status', 'User created succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showClient(User $client)
    {
        return view('dashboard.client.show', ["client" => $client]);
    }

    public function showPro(User $pro)
    {
        return view('dashboard.pro.show', ["pro" => $pro]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editClient(User $client)
    {
        return view('dashboard.client.edit', ["client" => $client]);
    }

    public function editPro(User $pro)
    {
       return view('dashboard.pro.edit', ["pro" => $pro]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUserPost $request, User $user)
    {
        $user->update($request->validated());
        return back()->with('status', 'User updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->update(['active'=>false]);
        return back()->with('status', 'User deleted succesfully');
    }

    public function exportClient()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function exportPro()
    {
        return Excel::download(new ProExport, 'pros.xlsx');
    }

}
