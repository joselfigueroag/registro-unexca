<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = Role::all();

        foreach ($roles as $role){
            $rol_name = $role->name; 
            $user = User::create([
                'user' => $rol_name,
                'email' => "$rol_name"."@"."$rol_name".".com",
                'password' => bcrypt('12345678'),
                'email_verified_at' => now(),
            ]);
            $user->assignRole("$rol_name");
        }
    }
}
