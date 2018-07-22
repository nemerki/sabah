<?php namespace Sabah\Form\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateSabahFormFaq extends Migration
{
    public function up()
    {
        Schema::create('sabah_form_faq', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->integer('category_id')->unsigned();
            $table->text('subject');
            $table->text('message');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('sabah_form_faq');
    }
}
