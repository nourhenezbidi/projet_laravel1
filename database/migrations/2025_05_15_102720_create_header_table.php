
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateHeaderTable extends Migration
{
    public function up()
    {
        Schema::create('header', function (Blueprint $table) {
            $table->id('header_id')->unique();
            $table->string('title');
            $table->string('subtitle');
            $table->string('description');
            $table->string('regiisration_link');
            $table->string('call_to_action_link');
            $table->string('header_image');
            $table->string('background_image');      
        });
    }
    public function down()
    {
        Schema::dropIfExists('header');
    }
}