<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
    public function definition(): array //returns an array with all the category fields made using faker library 
    {

        $name = $this-> faker ->unique()->word(20); //faker library creates 20 categories with an unique name

        return [
            'name'=> $name,
            'slug'=> Str::slug($name), //the slug replaces spaces with hyphens and transforms uppercase letters into lowercase letters

        ];
    }
}
