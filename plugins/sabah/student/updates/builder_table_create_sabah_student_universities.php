<?php namespace Sabah\Student\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateSabahStudentUniversities extends Migration
{
    public function up()
    {
        Schema::create('sabah_student_universities', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->string('link');
            $table->string('student');
            $table->text('ixtisas');
            $table->string('programs');
            $table->text('person');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('sabah_student_universities');
    }
}
