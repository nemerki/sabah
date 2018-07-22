<?php namespace Sabah\Form\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateSabahFormFaq extends Migration
{
    public function up()
    {
        Schema::table('sabah_form_faq', function($table)
        {
            $table->string('short')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('sabah_form_faq', function($table)
        {
            $table->dropColumn('short');
        });
    }
}
