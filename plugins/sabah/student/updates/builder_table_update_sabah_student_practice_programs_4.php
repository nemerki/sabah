<?php namespace Sabah\Student\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateSabahStudentPracticePrograms4 extends Migration
{
    public function up()
    {
        Schema::table('sabah_student_practice_programs', function($table)
        {
            $table->renameColumn('is_activ', 'is_active');
        });
    }
    
    public function down()
    {
        Schema::table('sabah_student_practice_programs', function($table)
        {
            $table->renameColumn('is_active', 'is_activ');
        });
    }
}
