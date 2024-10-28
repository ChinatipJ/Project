<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodsTable extends Migration
{
    public function up()
    {
        Schema::create('foods', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('name', 45)->nullable();
            $table->string('description', 500)->nullable();
            $table->string('ingredient', 255)->nullable();
            $table->string('time', 45)->nullable();
            $table->timestamp('timestamp')->nullable(); // Use nullable timestamp
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // Foreign key
            $table->string('img', 45)->nullable();
            $table->timestamps(); // created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('foods');
    }
}
