<?php namespace Sabah\Group\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateSabahGroupFaqs extends Migration
{
    public function up()
    {
        Schema::table('sabah_group_faqs', function($table)
        {
            $table->integer('order')->unsigned();
        });
    }
    
    public function down()
    {
        Schema::table('sabah_group_faqs', function($table)
        {
            $table->dropColumn('order');
        });
    }
}
