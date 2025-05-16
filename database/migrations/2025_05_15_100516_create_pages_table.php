<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreatePagesTable extends Migration
{
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id('page_id')->unique();
            $table->string('titleP');
            $table->string('subtitleP');
            $table->text('contentP');
            $table->string('slugP')->unique();
            $table->string('imageP')->nullable();
            $table->string('thumbnail_imageP')->nullable();
            $table->string('background_imageP')->nullable();
            $table->string('seo_titleP')->nullable();
            $table->string('seo_tagsP')->nullable();
            $table->string('meta_tagsP')->nullable();
            $table->string('languageP')->nullable();
            $table->enum('stateP', ['published', 'draft', 'archived', 'scheduled'])->default('draft');
            $table->string('additional_languageP', 2)->nullable();
            $table->dateTime('publish_dateP')->nullable();
            $table->dateTime('created_atP')->nullable();
            $table->dateTime('updated_atP')->nullable();

            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
