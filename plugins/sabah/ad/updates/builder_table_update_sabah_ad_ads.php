<?php namespace Sabah\Ad\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateSabahAdAds extends Migration
{
    public function up()
    {
        Schema::table('sabah_ad_ads', function($table)
        {
            $table->dateTime('organized')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('sabah_ad_ads', function($table)
        {
            $table->dateTime('organized')->nullable(false)->change();
        });
    }
}
