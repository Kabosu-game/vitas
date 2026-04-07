<?php

namespace Database\Seeders;

use App\Models\Admin;
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
        Admin::create([
            'name'     => 'Super Admin',
            'email'    => 'admin2@vitas.com',
            'phone'    => '0000000000',
            'password' => Hash::make('Admin@1234'),
            'status'   => 1,
        ]);
    }
}
