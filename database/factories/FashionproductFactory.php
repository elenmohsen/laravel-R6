<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fashionproduct>
 */
class FashionproductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     private function generateRandomImage($path)
     {
         $files = scandir($path);
         $files = array_diff($files, array('.', '..'));
 
         return fake()->randomElement($files);
     }
  
    public function definition(): array
    {
        return [
            'title' => fake()->randomElement(['tree pot', 'fashion set', 'juice Drinks']),
            'description' => fake()->text(),
            'price' => fake()->randomFloat(2),
            'image' => $this->generateRandomImage(public_path('assets/images/product')),
            'published' => fake()->numberBetween(0, 1),
            'status' => fake()->randomElement(['New arrivel', 'low price', ' ']),
            // 'image' => basename(fake()->image(public_path('assets/images/cars'))),
           
        ];
    }
}
