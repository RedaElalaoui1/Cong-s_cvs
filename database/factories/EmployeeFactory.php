<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        return [
            "name" => $this->faker->name(),
            "email"=> $this->faker->email(),
            "job"=> $this->faker->jobTitle(),
            "salary"=> $this->faker->randomNumber(5)
        ];
    }
}
