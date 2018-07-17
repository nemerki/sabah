<?php namespace Sabah\Ad;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'Sabah\Ad\Components\AdList' => 'adList',
            'Sabah\Ad\Components\ImportantAds' => 'importantAds',
            'Sabah\Ad\Components\OtherAds' => 'otherAds',
            'Sabah\Ad\Components\StudentAds' => 'studentAds',
            'Sabah\Ad\Components\StudentAdmissionAds' => 'studentAdmissionAds',

        ];
    }

    public function registerSettings()
    {
    }
}
