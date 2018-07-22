<?php namespace Sabah\Student\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateSabahStudentAbroadStudies extends Migration
{
    public function up()
    {
        Schema::table('sabah_student_abroad_studies', function($table)
        {
            $table->integer('sort_order')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('sabah_student_abroad_studies', function($table)
        {
            $table->dropColumn('sort_order');
        });
    }
}
