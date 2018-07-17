<?php namespace Sabah\Student\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateSabahStudentPracticePrograms2 extends Migration
{
    public function up()
    {
        Schema::table('sabah_student_practice_programs', function($table)
        {
            $table->string('slug');
            $table->string('company_name')->change();
            $table->string('position')->change();
        });
    }
    
    public function down()
    {
        Schema::table('sabah_student_practice_programs', function($table)
        {
            $table->dropColumn('slug');
            $table->string('company_name', 191)->change();
            $table->string('position', 191)->change();
        });
    }
}
