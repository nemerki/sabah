<?php namespace Sabah\Student\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateSabahStudentPracticePrograms3 extends Migration
{
    public function up()
    {
        Schema::table('sabah_student_practice_programs', function($table)
        {
            $table->boolean('is_activ')->default(1);
        });
    }
    
    public function down()
    {
        Schema::table('sabah_student_practice_programs', function($table)
        {
            $table->dropColumn('is_activ');
        });
    }
}
