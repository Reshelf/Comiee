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
        Schema::create('episodes', function (Blueprint $table) {
            $table->id();
            $table->unsignedbigInteger('book_id')->comment('作品ID');
            $table->unsignedInteger('number')->nullable()->comment('話数番号');
            $table->string('title')->nullable()->comment('タイトル');
            $table->json('contents')->charset(null)->nullable()->comment('マンガのコンテンツ');
            $table->text('thumbnail')->nullable()->comment('サムネイル');

            $table->boolean('is_hidden')->default(0)->comment('公開フラグ');
            $table->boolean('is_free')->default(0)->comment('無料フラグ');
            $table->integer('price')->default(50)->comment('値段');
            $table->integer('views')->default(0)->comment('閲覧数');

            $table->timestamps();
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('episodes');
    }
};
