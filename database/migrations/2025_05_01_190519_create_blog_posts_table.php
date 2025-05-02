<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateBlogPostsTable extends Migration
{
    public function up()
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle');
            $table->text('content');
            $table->string('slug')->unique();
            $table->unsignedBigInteger('author_id');
            $table->string('image')->nullable();
            $table->string('thumbnail_image')->nullable();
            $table->string('featured_image')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('seo_description')->nullable();
            $table->string('meta_tags')->nullable();
            $table->string('category');
            $table->string('tags')->nullable();
            $table->enum('state', ['published', 'draft', 'archived', 'scheduled'])->default('draft');
            $table->string('language', 2)->default('en');
            $table->string('additional_language', 2)->nullable();
            $table->dateTime('publish_date')->nullable();
            $table->integer('views_count')->default(0);
            $table->integer('read_time')->nullable();
            $table->timestamps();
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
    public function down()
    {
        Schema::dropIfExists('blog_posts');
    }
}
