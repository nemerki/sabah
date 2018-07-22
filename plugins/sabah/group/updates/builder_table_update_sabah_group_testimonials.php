<?php namespace Sabah\Group\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateSabahGroupTestimonials extends Migration
{
    public function up()
    {
        Schema::table('sabah_group_testimonials', function($table)
        {
            $table->integer('sort_order')->nullable()->unsigned();
            $table->increments('id')->unsigned(false)->change();
            $table->string('name')->change();
        });
    }
    
    public function down()
    {
        Schema::table('sabah_group_testimonials', function($table)
        {
            $table->dropColumn('sort_order');
            $table->increments('id')->unsigned()->change();
            $table->string('name', 191)->change();
        });
    }
}
