<?php namespace Sabah\News\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateSabahNewsTagable extends Migration
{
    public function up()
    {
        Schema::create('sabah_news_tagable', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('university_id');
            $table->integer('taggable_id');
            $table->string('taggable_type');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('sabah_news_tagable');
    }
}
