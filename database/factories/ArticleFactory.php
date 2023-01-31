<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'author' => $this->faker->firstName.' '.$this->faker->lastName,
            'title' => $this->faker->sentence(3),
            'article' => $this->faker->paragraphs(2, true),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
        ];
    }
}
