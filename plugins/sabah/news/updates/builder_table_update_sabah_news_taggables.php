<?php namespace Sabah\News\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateSabahNewsTaggables extends Migration
{
    public function up()
    {
        Schema::rename('sabah_news_tagable', 'sabah_news_taggables');
        Schema::table('sabah_news_taggables', function($table)
        {
            $table->increments('id')->unsigned(false)->change();
            $table->string('taggable_type')->change();
            $table->renameColumn('university_id', 'tag_id');
        });
    }
    
    public function down()
    {
        Schema::rename('sabah_news_taggables', 'sabah_news_tagable');
        Schema::table('sabah_news_tagable', function($table)
        {
            $table->increments('id')->unsigned()->change();
            $table->string('taggable_type', 191)->change();
            $table->renameColumn('tag_id', 'university_id');
        });
    }
}
