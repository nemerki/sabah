<?php namespace Sabah\News\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateSabahNewsTaggables2 extends Migration
{
    public function up()
    {
        Schema::table('sabah_news_taggables', function($table)
        {
            $table->integer('university_id');
            $table->integer('sabah_news_taggable_id');
            $table->string('sabah_news_taggable_type');
            $table->dropColumn('tag_id');
            $table->dropColumn('taggable_id');
            $table->dropColumn('taggable_type');
        });
    }
    
    public function down()
    {
        Schema::table('sabah_news_taggables', function($table)
        {
            $table->dropColumn('university_id');
            $table->dropColumn('sabah_news_taggable_id');
            $table->dropColumn('sabah_news_taggable_type');
            $table->integer('tag_id');
            $table->integer('taggable_id');
            $table->string('taggable_type', 191);
        });
    }
}
