<?php namespace Sabah\Ad\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateSabahAdAds2 extends Migration
{
    public function up()
    {
        Schema::table('sabah_ad_ads', function($table)
        {
            $table->boolean('is_important')->default(0);
        });
    }
    
    public function down()
    {
        Schema::table('sabah_ad_ads', function($table)
        {
            $table->dropColumn('is_important');
        });
    }
}
