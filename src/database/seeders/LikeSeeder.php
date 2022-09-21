<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use App\Models\Book;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Book $book)
    {
        for ($i = 0; $i < 100; $i++) {
            $book->likes->map(function ($like) {
                $faker = Faker::create('en_US');
                $like->user_id = $faker->name;
                $like->book_id = $faker->numberBetween(1, 100);
            });
        }
    }
}
