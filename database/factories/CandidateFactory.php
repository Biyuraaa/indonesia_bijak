<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Candidate>
 */
class CandidateFactory extends Factory
{
    protected $model = \App\Models\Candidate::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'photo' => $this->faker->imageUrl(640, 480, 'people'),
            'party_id' => \App\Models\Category::inRandomOrder()->first()->id,
            'category_id' => \App\Models\Category::inRandomOrder()->first()->id, // Mengambil id dari Category yang sudah ada
            'vision' => $this->faker->text,
            'mission' => $this->faker->text,
        ];
    }
}
