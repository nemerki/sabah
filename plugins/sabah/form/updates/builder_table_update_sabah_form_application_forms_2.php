<?php namespace Sabah\Form\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateSabahFormApplicationForms2 extends Migration
{
    public function up()
    {
        Schema::table('sabah_form_application_forms', function($table)
        {
            $table->renameColumn('university_id', 'university');
        });
    }
    
    public function down()
    {
        Schema::table('sabah_form_application_forms', function($table)
        {
            $table->renameColumn('university', 'university_id');
        });
    }
}
