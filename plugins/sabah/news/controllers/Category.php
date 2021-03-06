<?php namespace Sabah\News\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Category extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Sabah.News', 'main-menu-item', 'side-menu-item');
    }
}
