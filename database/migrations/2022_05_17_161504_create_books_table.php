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

            $table->boolean('genre_id')->default(false)->comment('ジャンル');
            $table->boolean('is_complete')->default(false)->comment('完結作品フラグ');
            $table->boolean('is_new')->default(false)->comment('今日の新作フラグ');

            $table->string('title')->comment('作品名');
            $table->string('lang')->default('jp')->comment('作品の言語');
            $table->integer('views')->default(0)->comment('閲覧回数');
            $table->text('story', 400)->nullable()->comment('あらすじ');
            $table->string('thumbnail')->nullable()->comment('作品サムネイル');

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
