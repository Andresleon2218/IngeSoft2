<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'key' => 'admin',
                'name' => 'Administrator'
            ],
            [
                'key' => 'pro',
                'name' => 'Professional'
            ],
            [
                'key' => 'client',
                'name' => 'Client'
            ]
        ];
        foreach($roles as $role) {
            Role::create($role);
        }
    }
}
