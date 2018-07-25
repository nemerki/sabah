<?php namespace Sabah\Form\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateSabahFormApplicationForms3 extends Migration
{
    public function up()
    {
        Schema::table('sabah_form_application_forms', function($table)
        {
            $table->string('company_name');
            $table->string('position');
        });
    }
    
    public function down()
    {
        Schema::table('sabah_form_application_forms', function($table)
        {
            $table->dropColumn('company_name');
            $table->dropColumn('position');
        });
    }
}
