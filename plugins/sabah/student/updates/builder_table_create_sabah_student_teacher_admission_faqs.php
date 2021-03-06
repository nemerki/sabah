<?php namespace Sabah\Student\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateSabahStudentTeacherAdmissionFaqs extends Migration
{
    public function up()
    {
        Schema::create('sabah_student_teacher_admission_faqs', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('question');
            $table->text('answer');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('sabah_student_teacher_admission_faqs');
    }
}
