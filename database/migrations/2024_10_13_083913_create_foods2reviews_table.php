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
        Schema::create('foods2reviews', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->foreignId('review_id')->constrained('reviews')->onDelete('cascade'); // Foreign key
            $table->foreignId('food_id')->constrained('foods')->onDelete('cascade'); // Foreign key
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foods2reviews');
    }
};
