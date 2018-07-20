<?php namespace Sabah\News\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateSabahNewsNews extends Migration
{
    public function up()
    {
        Schema::table('sabah_news_news', function($table)
        {
            $table->dateTime('published')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('sabah_news_news', function($table)
        {
            $table->dropColumn('published');
        });
    }
}
