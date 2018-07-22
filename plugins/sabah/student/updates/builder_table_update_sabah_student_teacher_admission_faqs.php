<?php namespace Sabah\Student\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateSabahStudentTeacherAdmissionFaqs extends Migration
{
    public function up()
    {
        Schema::table('sabah_student_teacher_admission_faqs', function($table)
        {
            $table->integer('sort_order')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('sabah_student_teacher_admission_faqs', function($table)
        {
            $table->dropColumn('sort_order');
        });
    }
}
