<?php namespace Sabah\Student\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateSabahStudentPracticePrograms6 extends Migration
{
    public function up()
    {
        Schema::table('sabah_student_practice_programs', function($table)
        {
            $table->integer('sort_order')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('sabah_student_practice_programs', function($table)
        {
            $table->dropColumn('sort_order');
        });
    }
}
