<?php namespace Sabah\News\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateSabahNewsNews3 extends Migration
{
    public function up()
    {
        Schema::table('sabah_news_news', function($table)
        {
            $table->dateTime('published')->nullable(false)->change();
        });
    }
    
    public function down()
    {
        Schema::table('sabah_news_news', function($table)
        {
            $table->dateTime('published')->nullable()->change();
        });
    }
}
