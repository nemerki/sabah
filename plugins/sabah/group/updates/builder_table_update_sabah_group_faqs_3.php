<?php namespace Sabah\Group\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateSabahGroupFaqs3 extends Migration
{
    public function up()
    {
        Schema::table('sabah_group_faqs', function($table)
        {
            $table->integer('short_order')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('sabah_group_faqs', function($table)
        {
            $table->integer('short_order')->nullable(false)->change();
        });
    }
}
