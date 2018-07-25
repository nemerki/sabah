<?php namespace Sabah\News;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'Sabah\News\Components\News' => 'news',
            'Sabah\News\Components\NewsCategoryComponent' => 'newscategorycomponent',
        ];
    }

    public function registerSettings()
    {
    }

    public function registerFormWidgets()
    {
        return [
            'Sabah\News\FormWidgets\NewsTags' => [
                'label' => 'Tags field',
                'code' => 'tags'
            ],
            'Sabah\News\FormWidgets\NewsWidget' => [
                'label' => 'News field',
                'code' => 'newswidget'
            ]
        ];
    }

}
