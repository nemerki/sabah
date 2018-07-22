<?php namespace Sabah\Group\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateSabahGroupTeams extends Migration
{
    public function up()
    {
        Schema::table('sabah_group_teams', function($table)
        {
            $table->integer('sort_order')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('sabah_group_teams', function($table)
        {
            $table->dropColumn('sort_order');
        });
    }
}
