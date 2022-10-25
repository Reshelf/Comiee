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
            $table->unsignedInteger('number')->nullable()->comment('エピソードの話数');

            $table->boolean('is_free')->default(false)->comment('無料フラグ');
            $table->json('contents')->nullable()->comment('マンガのコンテンツ');
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
