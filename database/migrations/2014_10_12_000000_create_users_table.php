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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('Hello!')->nullable();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('stripe_user_id')->nullable();

            $table->string('country_code', 4)->nullable();
            $table->string('avatar')->nullable();
            $table->string('thumbnail')->nullable();
            $table->text('body', 200)->nullable();
            $table->string('password')->nullable();

            $table->boolean('m_notice_1')->default(true)->comment('フォローしている作者が作品を投稿したときのメール通知フラグ');
            $table->boolean('m_notice_2')->default(true)->comment('ユーザーにフォローされたときの通知フラグ');
            $table->boolean('m_notice_3')->default(true)->comment('作品がお気に入りに登録されたときの通知フラグ');
            $table->boolean('m_notice_4')->default(true)->comment('お気に入り作品の新着エピソードが公開されたときの通知フラグ');
            $table->boolean('m_notice_5')->default(true)->comment('作品エピソードが購入されたときの通知フラグ');
            $table->boolean('m_notice_6')->default(true)->comment('Starbooksからのニュースやお得な情報を受け取るフラグ');

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
