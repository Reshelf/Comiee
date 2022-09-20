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
            $table->unsignedbigInteger('book_id'); // 作品
            $table->boolean('is_read')->default(false); // 既読フラグ
            $table->boolean('is_free')->default(true); // 無料フラグ

            $table->unsignedInteger('number')->nullable(); // 話数
            $table->json('contents')->nullable(); // 漫画のコンテンツ
            $table->integer('price')->default(0); // 値段
            $table->integer('views')->default(0); // 再生数

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
