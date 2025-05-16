<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainigTable extends Migration
{
    public function up(): void
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->id('trainig_id'); // Laravel creates "id" as PRIMARY KEY
            $table->string('label');
            $table->string('description');
            $table->string('image');
            $table->string('instructor');
            $table->integer('review_count')->default(0);
            $table->float('price')->nullable();
            $table->float('discounted_price')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('slide');
    }
}
