<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Category;

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
        $autoIncrement = $this->autoIncrement();

        return [
            'id' => $autoIncrement->current(),
            'title' => $this->faker->sentence(),
            'content' => $this->faker->realText(),
            'subtitle' => $this->faker->sentence(),
            'category_id' => Category::factory(),
            'image_path' => $this->faker->name()."png",
        ];
    }

    public function autoIncrement()
    {
        for ($i = 0; $i < 1000; $i++) {
            yield $i;
        }
    }
}
