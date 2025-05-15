
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateBannerTable extends Migration
{
    public function up()
    {
        Schema::create('banner', function (Blueprint $table) {
            $table->id('banner_id')->unique();
            $table->string('banner_image');
            $table->string('banner_title');
            $table->string('call_to_action_link');
            
        });
    }
    public function down()
    {
        Schema::dropIfExists('banner');
    }
}