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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique(); 
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('verification_code')->nullable();
            $table->integer('password_reset_code')->nullable();
            $table->integer('phone_verified')->default(0);
            $table->string('password')->nullable();
            $table->string('lat');
            $table->string('lng');
            $table->integer('is_admin')->default(0);
            $table->integer('role')->default(0);
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
