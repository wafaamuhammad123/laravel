<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
 //to create fake data to me 
            'title'=>fake()->text(),
            'description'=>fake()->text(),
            'user_id'=>fake()->numberBetween(1,4)
           
            //
        ];
    }
}
