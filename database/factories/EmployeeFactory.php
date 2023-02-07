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
            'NIK' => "2023".$this->faker->randomNumber(6, true),
            'joined' => $this->faker->dateTimeBetween('2023-01-01', '2023-02-07'),
            'company_id' => rand(1,3),
            'department_id' => rand(1, 10),
            'religion_id' => rand(1, 6)
        ];
    }
}
