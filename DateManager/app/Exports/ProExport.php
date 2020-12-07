<?php

namespace App\Exports;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProExport implements FromCollection, WithHeadings
{

    public function headings():array
    {
        return [
            'Documento',
            'Nombre',
            'Apellidos',
            'Telefono',
            'Email',
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $role = Role::where('key', 'pro')->first();
        $users = DB::table('users')->select('document','names', 'lastnames', 'phone', 'email')->where('role_id', $role->id)->get();
        return $users;
    }
}
