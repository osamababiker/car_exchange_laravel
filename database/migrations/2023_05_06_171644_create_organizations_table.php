<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->string('en_name'); 
            $table->string('ar_name'); 
            $table->string('slug')->unique();
            $table->string('organization_code')->unique();
            $table->string('primary_email')->unique(); 
            $table->string('secoundary_email')->nullable();
            $table->string('primary_phone')->unique();
            $table->string('secoundary_phone')->nullable();
            $table->string('logo');
            $table->string('license_image');
            $table->text('en_bio');
            $table->text('ar_bio');

            $table->string('facebook_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('linkedin_url')->nullable();

            $table->integer('status')->default(1);

            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')
                ->references('id') 
                ->on('countries')
                ->onDelete('cascade'); 

            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizations');
    }
};
