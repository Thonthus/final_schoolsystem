<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentData>
 */
class StudentDataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => fake()->unique()->regexify('56[0-9]{3}'),
            'class_id' => '03602',
            'number' => fake()->unique()->regexify('[1-9]{1}'),
            'firstname' => fake('th_TH')->firstName,
            'lastname' => fake('th_TH')->lastName,
            'nickname' => fake('th_TH')->word(),
            'birthdate' => fake()->dateTimeBetween(),
            'gender' => fake()->randomElement(['M', 'F']),
            'personal_id' => fake()->unique()->regexify ('[0-9]{13}'),
            'address' => fake()->address(),
            'phone' => fake()->regexify('06[0-9]{8}'),
            'email' => fake()->unique()->email()
 
        ];
    }
}
