<?php namespace Sabah\Ad\Components;

use Cms\Classes\ComponentBase;
use Sabah\Ad\Models\Ad;

class OtherAds extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Diger Elanlar',
            'description' => 'Xeber detay seyfesindeki diger elanlar '
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {


        $this->importantAds = $this->page['otherAds'] = $this->listRecords();
    }

    protected function listRecords()
    {
        $id = $this->page['record']->id;
        $category_id=$this->page['record']->category_id;

        $model = Ad::where('id', '<>', $id)->where('category_id',$category_id)->orderByDesc('created_at')->take(10)->get();

        return $model;
    }

}
