<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::firstOrCreate(
            ['email' => 'admin2@vitas.com'],
            [
                'name'     => 'Super Admin',
                'phone'    => '0000000000',
                'password' => Hash::make('Admin@1234'),
                'status'   => 1,
            ]
        );

        // Créer le rôle Super-Admin pour le guard admin s'il n'existe pas
        $role = Role::firstOrCreate(
            ['name' => 'Super-Admin', 'guard_name' => 'admin']
        );

        // Assigner le rôle si pas déjà assigné
        if (! $admin->hasRole('Super-Admin')) {
            $admin->assignRole($role);
        }
    }
}
