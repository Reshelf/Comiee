<?php

namespace Database\Seeders;

use App\Models\Book;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * 作品のテストデータ
     */
    public function run(Book $book)
    {
        $faker = Faker::create('en_US');

        for ($i = 0; $i < 1000; $i++) {
            $param = [
                'user_id' => random_int(1, 100),

                'is_contracted' => random_int(0, 1),
                'is_complete' => random_int(0, 1),
                'is_new' => random_int(0, 1),
                'is_color' => random_int(0, 1),
                'is_hidden' => random_int(0, 1),
                'is_suspend' => random_int(0, 1),

                'title' => $i,
                'screen_type' => 'horizontal',
                'lang' => 'ja',
                'genre_id' => random_int(1, 4),
                'views' => random_int(0, 99999999),
                'story' => $faker->text(400),
            ];
            Book::create($param);
        }
    }
}
