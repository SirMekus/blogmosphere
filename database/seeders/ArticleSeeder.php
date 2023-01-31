<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Sequence;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::factory()->times(20)->state(new Sequence(
            ['cover' => 'banana.jpg'],
            ['cover' => 'fest.jpg'],
            ['cover' => 'guava.jpg'],
            ['cover' => 'any.jpg'],
            ['cover' => 'lemon.jpg'],
        ))->create();
    }
}
