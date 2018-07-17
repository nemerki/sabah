<?php namespace Sabah\Student\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateSabahStudentUniversities extends Migration
{
    public function up()
    {
        Schema::table('sabah_student_universities', function($table)
        {
            $table->text('top');
        });
    }
    
    public function down()
    {
        Schema::table('sabah_student_universities', function($table)
        {
            $table->dropColumn('top');
        });
    }
}
