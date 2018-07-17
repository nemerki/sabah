<?php namespace Sabah\Ad\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateSabahAdAds extends Migration
{
    public function up()
    {
        Schema::create('sabah_ad_ads', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->text('content');
            $table->integer('category_id');
            $table->boolean('is_home')->default(0);
            $table->dateTime('organized');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('sabah_ad_ads');
    }
}
