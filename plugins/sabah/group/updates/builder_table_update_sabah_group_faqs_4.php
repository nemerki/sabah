<?php namespace Sabah\Group\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateSabahGroupFaqs4 extends Migration
{
    public function up()
    {
        Schema::table('sabah_group_faqs', function($table)
        {
            $table->renameColumn('short_order', 'sort_order');
        });
    }
    
    public function down()
    {
        Schema::table('sabah_group_faqs', function($table)
        {
            $table->renameColumn('sort_order', 'short_order');
        });
    }
}
