<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        $this->call([
            CivilStatusSeeder::class,
            GenderSeeder::class,
            RoleAndPermissionSeeder::class,
            BloodTypeSeeder::class,
            UserSeeder::class,
            StructuredDirectionSeeder::class,
            DepartmentAndClinicalServiceSeeder::class,
            SpecialistSeeder::class,
        ]);
    }
}
