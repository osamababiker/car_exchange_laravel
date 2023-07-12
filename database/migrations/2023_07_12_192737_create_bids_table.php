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
        Schema::create('bids', function (Blueprint $table) {
            $table->id();
            $table->double('price');
            $table->unsignedBigInteger('userId');
            $table->foreign('userId')
                ->references('id')
                ->on('users')
                ->onDelete('cascade'); 
            $table->unsignedBigInteger('carId');
            $table->foreign('carId')
                ->references('id')
                ->on('cars')
                ->onDelete('cascade'); 
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bids');
    }
};
