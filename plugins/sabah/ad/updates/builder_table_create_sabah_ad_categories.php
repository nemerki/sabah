<?php namespace Sabah\Ad\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateSabahAdCategories extends Migration
{
    public function up()
    {
        Schema::create('sabah_ad_categories', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('sabah_ad_categories');
    }
}
