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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->float('price');
            $table->integer('passengers')->default(1);
            $table->integer('doors');
            $table->integer('luggage');
            $table->boolean('is_active');
            $table->text('description');
            $table->string('image');
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('user_id')->constrained('users');


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
