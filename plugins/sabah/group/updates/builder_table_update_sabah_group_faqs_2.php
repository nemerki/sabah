<?php namespace Sabah\Group\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateSabahGroupFaqs2 extends Migration
{
    public function up()
    {
        Schema::table('sabah_group_faqs', function($table)
        {
            $table->renameColumn('order', 'short_order');
        });
    }
    
    public function down()
    {
        Schema::table('sabah_group_faqs', function($table)
        {
            $table->renameColumn('short_order', 'order');
        });
    }
}
