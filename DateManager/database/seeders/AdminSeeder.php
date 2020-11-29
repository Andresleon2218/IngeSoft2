<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::where('key','admin')->first();
        if ($adminRole) {
            $admin = [
                'role_id' => $adminRole->id,
                'document' => '1007706065',
                'names' => 'Jefferson',
                'lastnames' => 'Iles Arcos',
                'email' => 'jeferiles@gmail.com',
                'password' => Hash::make('Hola-123'),
                'phone' => '3229247604',
                'active' => true
            ];
            User::create($admin);
        }
    }
}
