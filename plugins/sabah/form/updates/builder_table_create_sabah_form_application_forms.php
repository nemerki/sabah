<?php namespace Sabah\Form\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateSabahFormApplicationForms extends Migration
{
    public function up()
    {
        Schema::create('sabah_form_application_forms', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('surname');
            $table->string('father');
            $table->date('birth_date');
            $table->string('mobile');
            $table->string('email');
            $table->string('linkedin');
            $table->text('activities');
            $table->text('language');
            $table->string('university');
            $table->string('specialty');
            $table->string('courses');
            $table->string('teaching_language');
            $table->string('university_score');
            $table->string('tqdk_score');
            $table->string('teaching_hours');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('sabah_form_application_forms');
    }
}
