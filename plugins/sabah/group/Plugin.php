<?php namespace Sabah\Group;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [

        ];
    }

    public function registerSettings()
    {
    }

    public function registerFormWidgets()
    {
        return [
            'Sabah\Group\FormWidgets\TestimonialWidget' => 'testimonialwidget',
            'Sabah\Group\FormWidgets\TeamWidget' => 'teamwidget',

        ];
    }
}
