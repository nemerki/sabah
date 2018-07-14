<?php namespace Sabah\Group\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateSabahGroupGalleries extends Migration
{
    public function up()
    {
        Schema::create('sabah_group_galleries', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('sabah_group_galleries');
    }
}
