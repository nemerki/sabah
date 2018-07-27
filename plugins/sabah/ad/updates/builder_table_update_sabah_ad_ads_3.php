<?php namespace Sabah\Ad\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateSabahAdAds3 extends Migration
{
    public function up()
    {
        Schema::table('sabah_ad_ads', function($table)
        {
            $table->date('published');
        });
    }
    
    public function down()
    {
        Schema::table('sabah_ad_ads', function($table)
        {
            $table->dropColumn('published');
        });
    }
}
