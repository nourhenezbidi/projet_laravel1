<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinkTable extends Migration
{
    public function up(): void
    {
        Schema::create('links', function (Blueprint $table) {
            $table->id('link_id'); 
            $table->foreignId('landing_page_id')->constrained('landing_pages')->onDelete('cascade');
            $table->string('label');
            $table->string('url');
             $table->enum('type', ['social', 'quick'])->default('social');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('links');
    }
};
