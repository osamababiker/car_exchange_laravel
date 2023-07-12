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
        Schema::create('settings', function (Blueprint $table) {
            $table->id(); 
            $table->string('ar_name'); 
            $table->string('en_name'); 
            $table->double('app_version'); 
            $table->string('primary_email');
            $table->string('secoundary_email')->nullable();
            $table->string('primary_phone');
            $table->string('secoundary_phone')->nullable();
            $table->text('ar_bio');
            $table->text('en_bio');
            $table->string('logo');
            $table->string('facebook_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->text('ar_privacy_policy');
            $table->text('en_privacy_policy');
            $table->text('ar_usage_policy');
            $table->text('en_usage_policy');
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
        Schema::dropIfExists('settings');
    }
};
