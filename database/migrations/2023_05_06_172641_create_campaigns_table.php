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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('en_title');   
            $table->string('ar_title');
            $table->string('slug')->unique(); 
            $table->string('primary_phone');
            $table->string('secoundary_phone')->nullable();
            $table->longText('en_content');
            $table->longText('ar_content'); 
            $table->string('image');
            $table->double('target');
            $table->integer('status')->default(1);
            $table->integer('progress')->default(0);
            $table->integer('is_verified')->default(1);

            $table->unsignedBigInteger('currancy_id');
            $table->foreign('currancy_id')
                ->references('id')
                ->on('currancies') 
                ->onDelete('cascade');

            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')
                    ->references('id')
                    ->on('countries')
                    ->onDelete('cascade'); 

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')
                    ->references('id')
                    ->on('categories')
                    ->onDelete('cascade');

            $table->unsignedBigInteger('organization_id');
            $table->foreign('organization_id')
                ->references('id')
                ->on('organizations')
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
        Schema::dropIfExists('campaigns');
    }
};
