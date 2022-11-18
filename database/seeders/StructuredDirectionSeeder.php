<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;
use App\Models\State;
use App\Models\Capital;
use App\Models\Municipality;
use App\Models\Parish;

class StructuredDirectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents("database/venezuela.json");
        $info_vzl = json_decode($data, True);
        $country = Country::create(['name'=>'Venezuela']);

        foreach ($info_vzl as $bloque){
            $state = State::create(['name'=>"{$bloque['estado']}", 'country_id'=>"$country->id"]);
            $capital = Capital::create(['name'=>"{$bloque['capital']}", 'state_id'=>"$state->id"]);
            foreach ($bloque['municipios'] as $municipio){
                $municipality = Municipality::create(['name'=>"{$municipio['municipio']}", 'capital_id'=>"$capital->id"]);
                foreach ($municipio['parroquias'] as $parroquia){
                    Parish::create(['name'=>"$parroquia", 'municipality_id'=>"$municipality->id"]);
                }
            }    
        }
    }
}
