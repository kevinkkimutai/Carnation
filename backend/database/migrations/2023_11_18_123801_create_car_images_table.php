<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('car_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('car_id');
            $table->string('image_url');
            $table->string('status');
            $table->integer('order');
            $table->unsignedBigInteger('created_by_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_images');
    }
};
