<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'active' => $this->faker->boolean(),
            'NIK' => "2023".$this->faker->randomNumber(5, true),
            'joined' => date('Y-m-d H:i:s'),
            'company_id' => rand(1,3),
            'department_id' => rand(1, 10),
            'religion_id' => rand(1, 6)
        ];
    }
}
