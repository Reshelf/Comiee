<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use Dotenv\Util\Str;
use Faker\Factory as Faker;
use App\Models\User;

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
                'title' => $i,
                'story' => $faker->text(400),
                'user_id' => random_int(1, 100),
            ];
            Book::create($param);
        }
    }
}
