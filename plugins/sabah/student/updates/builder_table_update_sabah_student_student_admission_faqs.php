<?php namespace Sabah\Student\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateSabahStudentStudentAdmissionFaqs extends Migration
{
    public function up()
    {
        Schema::rename('sabah_student_student_admissions_faqs', 'sabah_student_student_admission_faqs');
    }
    
    public function down()
    {
        Schema::rename('sabah_student_student_admission_faqs', 'sabah_student_student_admissions_faqs');
    }
}
