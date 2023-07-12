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
        Schema::create('currancies', function (Blueprint $table) {
            $table->id(); 
            $table->string('en_name');
            $table->string('ar_name');
            $table->string('symbol');
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
        Schema::dropIfExists('currancies');
    }
};
