<?php namespace Sabah\Group\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateSabahGroupGalleries extends Migration
{
    public function up()
    {
        Schema::table('sabah_group_galleries', function($table)
        {
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->increments('id')->unsigned(false)->change();
            $table->string('name')->change();
        });
    }
    
    public function down()
    {
        Schema::table('sabah_group_galleries', function($table)
        {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
            $table->dropColumn('deleted_at');
            $table->increments('id')->unsigned()->change();
            $table->string('name', 191)->change();
        });
    }
}
