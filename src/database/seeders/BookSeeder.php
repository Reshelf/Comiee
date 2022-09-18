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
            $author = User::findOrFail(random_int(1, 100));
            $manga_artist = User::findOrFail(random_int(1, 100));

            $param = [
                'title' => $faker->text(15),
                'story' => $faker->text(400),
                'author' => $author->name,
                'manga_artist' => $manga_artist->name,
                'user_id' => random_int(1, 100),
            ];
            Book::create($param);
        }
    }
}
