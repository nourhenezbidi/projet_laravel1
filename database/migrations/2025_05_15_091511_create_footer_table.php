
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateFooterTable extends Migration
{
    public function up()
    {
        Schema::create('footer', function (Blueprint $table) {
            $table->id('footer_id')->unique();
            $table->string('phone_number');
            $table->string('contact_email');
            $table->string('address');
            $table->string('social_media_links')->nullable();            
        });
    }
    public function down()
    {
        Schema::dropIfExists('footer');
    }
}