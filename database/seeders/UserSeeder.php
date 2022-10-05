<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678'),
            'email_verified_at' => now()
        ]);
        $admin->assignRole('admin');

        $employee = User::create([
            'name' => 'Employee',
            'email' => 'employee@employee.com',
            'password' => bcrypt('12345678'),
            'email_verified_at' => now()
        ]);
        $employee->assignRole('employee');
    }
}
