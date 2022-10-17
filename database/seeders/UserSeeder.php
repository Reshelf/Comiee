<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * ユーザーのテストデータ
     */
    public function run()
    {
        // 自分
        // User::create([
        //     'name' => env('TEST_USERNAME'),
        //     'username' => env('TEST_USER_CODENAME'),
        //     'email' => env('TEST_USER_EMAIL'),
        //     'password' => env('TEST_USER_PASSWORD'),
        // ]);

        $faker = Faker::create('en_US');

        for ($i = 0; $i < 1000; $i++) {
            $param = [
                'name' => $faker->name,
                'username' => $faker->numberBetween(1001, 9999999999999999),
                'body' => $faker->text(200),
                'email' => $faker->email,
                'password' => 'password',
            ];
            User::create($param);
        }

        // サンプル
        // User::factory(500)->create();
    }
}
