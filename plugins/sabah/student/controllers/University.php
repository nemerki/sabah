<?php namespace Sabah\Student\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class University extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Sabah.Student', 'main-menu-item');
    }
}
