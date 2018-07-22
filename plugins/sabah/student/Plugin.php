<?php namespace Sabah\Student;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }


    public function registerFormWidgets()
    {
        return [
            'Sabah\Student\FormWidgets\StudentAdmissionFaqWidget' => 'studentadmissionfaqwidget',

        ];
    }
}
