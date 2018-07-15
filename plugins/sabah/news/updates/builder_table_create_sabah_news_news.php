<?php namespace Sabah\News\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateSabahNewsNews extends Migration
{
    public function up()
    {
        Schema::create('sabah_news_news', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title');
            $table->text('content');
            $table->string('slug');
            $table->integer('category_id')->unsigned();
            $table->boolean('is_home')->default(0);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('sabah_news_news');
    }
}
