<?php namespace Sabah\Group\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateSabahGroupSliders extends Migration
{
    public function up()
    {
        Schema::table('sabah_group_sliders', function($table)
        {
            $table->integer('sort_order')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('sabah_group_sliders', function($table)
        {
            $table->dropColumn('sort_order');
        });
    }
}
