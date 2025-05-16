<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlideTable extends Migration
{
    public function up(): void
    {
        Schema::create('slide', function (Blueprint $table) {
            $table->id('slide_id'); // Laravel creates "id" as PRIMARY KEY
            $table->foreignId('carousel_id')->constrained('carousel')->onDelete('cascade');
            $table->string('slide_image');
            $table->string('slide_title');
            $table->string('slide_description');
            $table->string('slide_link')->nullable();
            $table->integer('slide_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('slide');
    }
}
