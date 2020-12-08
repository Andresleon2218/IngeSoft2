<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Exports\ProExport;
use App\Exports\UsersExport;
use App\Http\Requests\StoreUserPost;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{

    public function exportClient()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function exportPro()
    {
        return Excel::download(new ProExport, 'pros.xlsx');
    }

}
