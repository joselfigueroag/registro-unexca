<?php

namespace Database\Seeders;

use App\Models\CivilStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CivilStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['Soltero/a', 'Casado/a', 'Separado/a', 'Divorciado/a', 'Viudo/a'];

        foreach ($types as $type){
            CivilStatus::create(['type'=>"$type"]);
        }
    }
}
