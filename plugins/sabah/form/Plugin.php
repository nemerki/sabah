<?php namespace Sabah\Form;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'Sabah\Form\Components\Faq' => 'Faq',
            'Sabah\Form\Components\StudentFaqComponent' => 'StudentFaqComponent',
        ];
    }

    public function registerSettings()
    {
    }
}
