<?php namespace Sabah\Group\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateSabahGroupFaqs extends Migration
{
    public function up()
    {
        Schema::create('sabah_group_faqs', function($table)
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
        Schema::dropIfExists('sabah_group_faqs');
    }
}
