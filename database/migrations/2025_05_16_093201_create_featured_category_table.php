<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeaturedCompanyTable extends Migration
{
    public function up(): void
    {
        Schema::create('featured_companies', function (Blueprint $table) {
            $table->id('featured_company_id'); // Laravel creates "id" as PRIMARY KEY
            $table->string('title');
            $table->string('description');
            $table->string('image');
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('featured_companies');
    }
}
