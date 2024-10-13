<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('comment', 45)->nullable();
            $table->string('star', 45)->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key
            $table->timestamps(); // created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
