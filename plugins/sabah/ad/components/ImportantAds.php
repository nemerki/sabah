<?php namespace Sabah\Ad\Components;

use Carbon\Carbon;
use Cms\Classes\ComponentBase;
use Sabah\Ad\Models\Ad;

class ImportantAds extends ComponentBase
{
    public $importantAds;

    public function componentDetails()
    {
        return [
            'name' => 'ImportantAds Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {

        $this->importantAds = $this->page['importantAds'] = $this->listRecords();
         $this->page['now'] = Carbon::now();
    }

    protected function listRecords()
    {
        $importantAds = Ad::where('is_important', '1')->orderBy('created_at', 'DESC')->take(4)->get();
        return $importantAds;
    }

}
