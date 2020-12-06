<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Barryvdh\DomPDF\PDF;


class PdfController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'admin']);
    }
    /**
     * Download pdf file
     *
     */
    public function downloadClient()
    {
        $role = Role::where('name', 'client');
        $clients = User::where('role_id', $role->key)->paginate(6);
        $pdf = PDF::loadView('dashboard.client.pdf', ['clients' => $clients]);
        return $pdf->stream('clients.pdf');
    }

    public function downloadPro()
    {
        $role = Role::where('name', 'pro');
        $pros = User::where('role_id', $role->key)->paginate(6);
        $pdf = PDF::loadView('dashboard.pro.pdf', ['pros' => $pros]);
        return $pdf->stream('pros.pdf');
    }

    /**
     * Show the pdf.
     *
     */
    public function streamClient()
    {
        $role = Role::where('name', 'client');
        $clients = User::where('role_id', $role->key)->paginate(6);
        $pdf = PDF::loadView('dashboard.client.pdf', ['clients' => $clients]);
        return $pdf->stream('clients.pdf');
    }

    public function streamPro()
    {
        $role = Role::where('name', 'pro');
        $pros = User::where('role_id', $role->key)->paginate(6);
        $pdf = PDF::loadView('dashboard.pro.pdf', ['pros' => $pros]);
        return $pdf->stream('pros.pdf');
    }

}
