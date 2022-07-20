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
            $table->id('id');
            $table->string('lastname_users');
            $table->string('firstname_users');
            $table->string('email_users')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('adress_users')->nullable();
            $table->string('likedin_link_users')->nullable();
            $table->string('web_link_users')->nullable();
            $table->string('github_link_users')->nullable();
            $table->string('portfolio_link_users')->nullable();
            $table->string('biography_users')->nullable();
            $table->string('image_link_users')->nullable();
            $table->boolean('admin')->nullable();
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
