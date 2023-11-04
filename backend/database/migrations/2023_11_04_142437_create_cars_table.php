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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->unsignedBigInteger('make_id');
            $table->unsignedBigInteger('model_id');
            $table->string('body_type');
            $table->year('year');
            $table->decimal('price', 8, 2);
            $table->integer('mileage');
            $table->integer('cc');
            $table->string('transmission');
            $table->string('color');
            $table->string('interior');
            $table->string('drive_train');
            $table->text('description');
            $table->string('availability');
            $table->integer('top_speed');
            $table->string('fuel');
            $table->boolean('is_hybrid');
            $table->integer('seat_number');
            $table->integer('doors');
            $table->string('steering');
            $table->string('car_usage');
            $table->string('category');
            $table->unsignedBigInteger('created_by_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
