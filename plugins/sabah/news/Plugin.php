<?php namespace Sabah\News;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'Sabah\News\Components\News' => 'news'
        ];
    }

    public function registerSettings()
    {
    }
}
