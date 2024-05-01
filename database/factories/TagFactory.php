<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array //returns an array with all the post fields made using faker library 
    {

        $name = $this-> faker ->unique()->word(20); //faker library creates 20 tags with an unique name

        return [
            'name'=> $name,
            'slug'=> Str::slug($name),
            'color'=> $this->faker->randomElement(['yellow', 'green', 'blue', 'indigo', 'purple', 'pink', 'red']),
        ];
    }
}
