<?php namespace Sabah\Group\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateSabahGroupTeams2 extends Migration
{
    public function up()
    {
        Schema::table('sabah_group_teams', function($table)
        {
            $table->integer('o');
        });
    }
    
    public function down()
    {
        Schema::table('sabah_group_teams', function($table)
        {
            $table->dropColumn('o');
        });
    }
}
