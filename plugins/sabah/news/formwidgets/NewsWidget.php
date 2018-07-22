<?php namespace Sabah\News\FormWidgets;

use Backend\Classes\FormWidgetBase;

/**
 * NewsWidget Form Widget
 */
class NewsWidget extends FormWidgetBase
{
    /**
     * @inheritDoc
     */
    protected $defaultAlias = 'sabah_news_news_widget';

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
        return $this->makePartial('newswidget');
    }

    /**
     * Prepares the form widget view data
     */
    public function prepareVars()
    {
        $this->vars['name'] = $this->formField->getName();
        $this->vars['value'] = $this->getLoadValue();
        $this->vars['model'] = $this->model;
    }

    /**
     * @inheritDoc
     */
    public function loadAssets()
    {
        $this->addCss('css/newswidget.css', 'Sabah.News');
        $this->addJs('js/newswidget.js', 'Sabah.News');
    }

    /**
     * @inheritDoc
     */
    public function getSaveValue($value)
    {
        return $value;
    }
}
