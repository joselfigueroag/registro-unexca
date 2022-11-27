<?php

namespace Database\Seeders;

use App\Models\BloodType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BloodTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = ['Tipo A+', 'Tipo A-', 'Tipo B+', 'Tipo B-', 'Tipo AB+', 'Tipo AB-', 'Tipo O+', 'Tipo O-'];

        foreach ($groups as $group){
            BloodType::create(['group'=>$group]);
        }
    }
}
