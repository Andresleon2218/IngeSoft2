<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\Auth;


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
        $role = Role::where('key', 'client')->first();
        $clients = User::where('role_id', $role->id)->paginate(6);
        $pdf = resolve('dompdf.wrapper');
        $pdf->loadView('dashboard.client.pdf', ['clients' => $clients]);
        return $pdf->download('clients.pdf');
    }

    public function downloadPro()
    {
        $role = Role::where('key', 'pro')->first();
        $pros = User::where('role_id', $role->id)->paginate(6);
        $pdf = resolve('dompdf.wrapper');
        $pdf->loadView('dashboard.pro.pdf', ['pros' => $pros]);
        return $pdf->download('pros.pdf');
    }

    public function downloadSchedule()
    {
        $schedules = Auth::user()->schedules;
        $pdf = resolve('dompdf.wrapper');
        $pdf->loadView('schedule.pdf', ['schedules' => $schedules]);
        return $pdf->download('horario.pdf');
    }

    public function downloadDate()
    {
        $dates = Auth::user()->dates;
        $pdf = resolve('dompdf.wrapper');
        $pdf->loadView('date.pdf', ['dates' => $dates]);
        return $pdf->download('citas.pdf');
    }
    /**
     * Show the pdf.
     *
     */
    public function streamClient()
    {
        $role = Role::where('key', 'client')->first();
        $clients = User::where('role_id', $role->id)->paginate(6);
        $pdf = resolve('dompdf.wrapper');
        $pdf->loadView('dashboard.client.pdf', ['clients' => $clients]);
        return $pdf->stream('clients.pdf');
    }

    public function streamPro()
    {
        $role = Role::where('key', 'pro')->first();
        $pros = User::where('role_id', $role->id)->paginate(6);
        $pdf = resolve('dompdf.wrapper');
        $pdf->loadView('dashboard.pro.pdf', ['pros' => $pros]);
        return $pdf->stream('pros.pdf');
    }

    public function streamSchedule()
    {
        $schedules = Auth::user()->schedules;
        $pdf = resolve('dompdf.wrapper');
        $pdf->loadView('schedule.pdf', ['schedules' => $schedules]);
        return $pdf->stream('horario.pdf');
    }

    public function streamDate()
    {
        $dates = Auth::user()->dates;
        $pdf = resolve('dompdf.wrapper');
        $pdf->loadView('date.pdf', ['dates' => $dates]);
        return $pdf->stream('citas.pdf');
    }
}
