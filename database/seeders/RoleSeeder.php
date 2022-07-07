<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
            'role_title' => 'Admin',
            'role_description' => 'Admin'
            ],
            [
            'role_title' => 'Manager',
            'role_description' => 'Manager'
            ],
            [
            'role_title' => 'User',
            'role_description' => 'User'
            ],
        ];

        foreach($data as $role){
            Role::create([
                'role_title' => $role['role_title'],
                'role_description' => $role['role_description']
            ]);
        }
    }
}
