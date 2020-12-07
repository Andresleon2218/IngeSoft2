<?php

namespace App\Exports;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection, WithHeadings
{

    public function headings(): array
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
        $role = Role::where('key', 'client')->first();
        $users = DB::table('users')->select('document','names', 'lastnames', 'phone', 'email')->where('role_id', $role->id)->get();
        return $users;
    }
}
