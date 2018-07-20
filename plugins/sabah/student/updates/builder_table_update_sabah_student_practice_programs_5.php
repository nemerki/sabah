<?php namespace Sabah\Student\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateSabahStudentPracticePrograms5 extends Migration
{
    public function up()
    {
        Schema::table('sabah_student_practice_programs', function($table)
        {
            $table->text('description');
            $table->text('content');
            $table->dropColumn('description_top');
            $table->dropColumn('description_bottom');
            $table->dropColumn('job_description');
            $table->dropColumn('requirements');
        });
    }
    
    public function down()
    {
        Schema::table('sabah_student_practice_programs', function($table)
        {
            $table->dropColumn('description');
            $table->dropColumn('content');
            $table->text('description_top');
            $table->text('description_bottom');
            $table->text('job_description');
            $table->text('requirements');
        });
    }
}
