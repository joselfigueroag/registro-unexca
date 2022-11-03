<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\ClinicalService;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\specialist>
 */
class SpecialistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $departmens = Department::with(['clinical_services'])->get();
        $department = $departmens->random();
        $clinical_service = $department->clinical_services->random();

        return [
            'first_name' => fake()->text(10),
            'second_name' => fake()->text(10),
            'first_surname' => fake()->text(10),
            'second_surname' => fake()->text(10),
            'identification_number' => fake()->randomNumber(8),
            'birthday_date' => fake()->date(),
            'gender' => fake()->randomElement(['M', 'F']),
            // 'email' => fake()->safeEmail(),
            'clinical_service_id' => $clinical_service->id,
            'address' => fake()->address(),
        ];
    }
}
