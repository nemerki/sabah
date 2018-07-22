<?php namespace Sabah\News\FormWidgets;

use Backend\Classes\FormWidgetBase;
use Sabah\News\Models\News;
use Sabah\News\Models\Taggable;
use Sabah\Student\Models\University;

/**
 * NewsTags Form Widget
 */
class NewsTags extends FormWidgetBase
{

    public function widgetDetails()
    {
        return [
            'name' => 'NewsTags',
            'description' => 'Xeber tag seçer'
        ];
    }

    /**
     * @inheritDoc
     */
    protected $defaultAlias = 'sabah_news_news_tags';

    /**
     * @inheritDoc
     */
    public function init()
    {
    }


    /**
     * @inheritDoc
     */
    public function render()
    {
        $this->prepareVars();
        return $this->makePartial('newstags');
    }

    /**
     * Prepares the form widget view data
     */
    public function prepareVars()
    {
        $this->vars['id'] = $this->model->id;
        $this->vars['tags'] = University::all()->lists('name', 'id');
        $this->vars['name'] = $this->formField->getName() . '[]';
//
        if (!empty($this->getLoadValue())) {
            $this->vars['selectedValues'] = $this->getLoadValue();
        } else {
            $this->vars['selectedValues'] = [];
        }
    }

//    public function getSaveValue($tags)
//    {
//
//        $news = News::latest()->get();
//
//
//        foreach ($tags as $tagId) {
//
//            if (!is_numeric($tagId)) {
//
//                $tags = University::find(1);
//                $news->tags()->save($tags);
//
//
//            }
//        }


//    }

    /**
     * @inheritDoc
     */
    public function loadAssets()
    {
        $this->addCss('css/newstags.css', 'Sabah.News');
        $this->addJs('js/newstags.js', 'Sabah.News');
//        $this->addCss('css/select2.css', 'Sabah.News');
//        $this->addJs('js/select2.js', 'Sabah.News');
    }

    /**
     * @inheritDoc
     */

}
