<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CounselorData>
 */
class CounselorDataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'counselor_id' => fake()->unique()->regexify('000[1-5]{5}'),
            'counselor_name' => fake('th_TH')->name(),
            'counselor_tel' => fake()->regexify('06[0-9]{8}')
        ];
    }
}
