<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category_name' =>$this->faker->sentence(8),
            'course_count' =>rand(0,10),
            'course_feeds' =>rand(10000,50000),
            'date' =>rand(0,5)
        ];
    }
}
