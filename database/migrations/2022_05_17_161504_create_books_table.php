<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->unsignedbigInteger('user_id')->comment('ユーザー');

            $table->boolean('is_contracted')->default(0)->comment('契約済フラグ');
            $table->boolean('is_complete')->default(0)->comment('完結作品フラグ');
            $table->boolean('is_new')->default(0)->comment('今日の新作フラグ');
            $table->boolean('is_hidden')->default(1)->comment('非公開フラグ');
            $table->boolean('is_suspend')->default(0)->comment('休載フラグ');
            $table->boolean('is_all_charge')->default(0)->comment('全エピソード有料化フラグ');

            $table->string('title')->unique()->comment('作品名');
            $table->boolean('lang')->default(0)->comment('作品の言語');
            $table->boolean('genre_id')->default(0)->comment('ジャンル');
            $table->integer('views')->default(0)->comment('閲覧回数');
            $table->text('story', 400)->nullable()->comment('あらすじ');
            $table->text('thumbnail')->nullable()->comment('作品サムネイル');

            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
