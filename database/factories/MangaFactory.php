<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Manga>
 */
class MangaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->unique()->word(),
            'slug' =>fake()->unique()->slug(),
            'description' => implode(fake()->paragraphs(5)),
            'rating' => 0,
            'author' => fake()->name(),
            'publication_year'=> fake()->numberBetween(1960, 2022),
        ];
    }
}
