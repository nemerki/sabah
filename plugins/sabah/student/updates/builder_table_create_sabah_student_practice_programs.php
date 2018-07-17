<?php namespace Sabah\Student\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateSabahStudentPracticePrograms extends Migration
{
    public function up()
    {
        Schema::create('sabah_student_practice_programs', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('description_top');
            $table->text('description_bottom');
            $table->string('company_name');
            $table->boolean('payment_method')->default(0);
            $table->dateTime('expiry_date');
            $table->text('job_description');
            $table->text('requirements');
            $table->string('position');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('sabah_student_practice_programs');
    }
}
