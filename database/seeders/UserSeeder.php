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
            'user' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678'),
            'email_verified_at' => now()
        ]);
        $admin->assignRole('admin');

        $employee = User::create([
            'name' => 'Employee',
            'user' => 'employee',
            'email' => 'employee@employee.com',
            'password' => bcrypt('12345678'),
            'email_verified_at' => now()
        ]);
        $employee->assignRole('employee');

        $specialist = User::create([
            'name' => 'Specialist',
            'user' => 'specialist',
            'email' => 'specialist@specialist.com',
            'password' => bcrypt('12345678'),
            'email_verified_at' => now()
        ]);
        $specialist->assignRole('specialist');
    }
}
