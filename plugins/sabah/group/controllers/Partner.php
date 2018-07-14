<?php namespace Sabah\Group\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Partner extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Sabah.Group', 'main-menu-item', 'side-menu-item3');
    }
}
