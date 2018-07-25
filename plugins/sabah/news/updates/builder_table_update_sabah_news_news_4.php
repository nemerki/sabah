<?php namespace Sabah\News\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateSabahNewsNews4 extends Migration
{
    public function up()
    {
        Schema::table('sabah_news_news', function($table)
        {
            $table->dateTime('published')->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('sabah_news_news', function($table)
        {
            $table->dateTime('published')->default('CURRENT_TIMESTAMP')->change();
        });
    }
}
