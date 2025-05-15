<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuItemsTable extends Migration
{
    public function up()
    {
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')->constrained('pages')->onDelete('cascade');
            $table->integer('order')->default(0);
            $table->string('label');
            $table->string('url')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('menu_items');
    }
}
