<?php namespace Nemerki\News\Components;


use Lang;
use Cms\Classes\Page;
use Cms\Classes\ComponentBase;
use RainLab\Builder\Classes\ComponentHelper;
use SystemException;
use Exception;

class SameCategoryNewsListComponent extends ComponentBase
{
    /**
     * A model instance to display
     * @var \October\Rain\Database\Model
     */
    public $record = null;
    /**
     * A model instance to display
     * @var \October\Rain\Database\Model
     */
    public $sameCategoryRecord = null;


    /**
     * Reference to the page name for linking to details.
     * @var string
     */
    public $detailsPage;


    /**
     * Model column to use as a record identifier in the details page links
     * @var string
     */
    public $detailsKeyColumn;

    /**
     * Name of the details page URL parameter which takes the record identifier.
     * @var string
     */
    public $detailsUrlParameter;

    /**
     * Message to display if the record is not found.
     * @var string
     */
    public $notFoundMessage;

    /**
     * Model column to display on the details page.
     * @var string
     */
    public $displayColumn;

    /**
     * Model column to use as a record identifier for fetching the record from the database.
     * @var string
     */
    public $modelKeyColumn;

    /**
     * Identifier value to load the record from the database.
     * @var string
     */
    public $identifierValue;

    public function componentDetails()
    {
        return [

            'name' => 'Same Category',
            'description' => 'Tek xeberi ve eyni kategoride olan xeberleri listeler'

        ];
    }

    //
    // Properties
    //

    public function defineProperties()
    {
        return [
            'detailsPage' => [
                'title' => 'rainlab.builder::lang.components.list_details_page',
                'description' => 'rainlab.builder::lang.components.list_details_page_description',
                'type' => 'dropdown',
                'showExternalParam' => false,
                'group' => 'rainlab.builder::lang.components.list_details_page_link'
            ],
            'detailsKeyColumn' => [
                'title' => 'rainlab.builder::lang.components.list_details_key_column',
                'description' => 'rainlab.builder::lang.components.list_details_key_column_description',
                'type' => 'autocomplete',
                'depends' => ['modelClass'],
                'showExternalParam' => false,
                'group' => 'rainlab.builder::lang.components.list_details_page_link'
            ],
            'detailsUrlParameter' => [
                'title' => 'rainlab.builder::lang.components.list_details_url_parameter',
                'description' => 'rainlab.builder::lang.components.list_details_url_parameter_description',
                'type' => 'string',
                'default' => 'id',
                'showExternalParam' => false,
                'group' => 'rainlab.builder::lang.components.list_details_page_link'
            ],
            'modelClass' => [
                'title' => 'rainlab.builder::lang.components.details_model',
                'type' => 'dropdown',
                'showExternalParam' => false
            ],
            'identifierValue' => [
                'title' => 'rainlab.builder::lang.components.details_identifier_value',
                'description' => 'rainlab.builder::lang.components.details_identifier_value_description',
                'type' => 'string',
                'default' => '{{ :id }}',
                'validation' => [
                    'required' => [
                        'message' => Lang::get('rainlab.builder::lang.components.details_identifier_value_required')
                    ]
                ]
            ],
            'modelKeyColumn' => [
                'title' => 'rainlab.builder::lang.components.details_key_column',
                'description' => 'rainlab.builder::lang.components.details_key_column_description',
                'type' => 'autocomplete',
                'default' => 'id',
                'validation' => [
                    'required' => [
                        'message' => Lang::get('rainlab.builder::lang.components.details_key_column_required')
                    ]
                ],
                'showExternalParam' => false
            ],
            'displayColumn' => [
                'title' => 'rainlab.builder::lang.components.details_display_column',
                'description' => 'rainlab.builder::lang.components.details_display_column_description',
                'type' => 'autocomplete',
                'depends' => ['modelClass'],
                'validation' => [
                    'required' => [
                        'message' => Lang::get('rainlab.builder::lang.components.details_display_column_required')
                    ]
                ],
                'showExternalParam' => false
            ],
            'notFoundMessage' => [
                'title' => 'rainlab.builder::lang.components.details_not_found_message',
                'description' => 'rainlab.builder::lang.components.details_not_found_message_description',
                'default' => Lang::get('rainlab.builder::lang.components.details_not_found_message_default'),
                'type' => 'string',
                'showExternalParam' => false
            ]
        ];
    }

    public function getDetailsPageOptions()
    {
        $pages = Page::sortBy('baseFileName')->lists('baseFileName', 'baseFileName');

        $pages = [
                '-' => Lang::get('rainlab.builder::lang.components.list_details_page_no')
            ] + $pages;

        return $pages;
    }

    public function getDetailsKeyColumnOptions()
    {
        return ComponentHelper::instance()->listModelColumnNames();
    }

    public function getModelClassOptions()
    {
        return ComponentHelper::instance()->listGlobalModels();
    }

    public function getDisplayColumnOptions()
    {
        return ComponentHelper::instance()->listModelColumnNames();
    }

    public function getModelKeyColumnOptions()
    {
        return ComponentHelper::instance()->listModelColumnNames();
    }

    //
    // Rendering and processing
    //

    public function onRun()
    {
        $this->prepareVars();

        $this->record = $this->page['record'] = $this->loadRecord();
        $this->sameCategoryRecord = $this->page['sameCategoryRecord'] = $this->sameCategory();
    }

    protected function prepareVars()
    {
        $this->notFoundMessage = $this->page['notFoundMessage'] = Lang::get($this->property('notFoundMessage'));
        $this->displayColumn = $this->page['displayColumn'] = $this->property('displayColumn');
        $this->modelKeyColumn = $this->page['modelKeyColumn'] = $this->property('modelKeyColumn');
        $this->identifierValue = $this->page['identifierValue'] = $this->property('identifierValue');


        $this->detailsKeyColumn = $this->page['detailsKeyColumn'] = $this->property('detailsKeyColumn');
        $this->detailsUrlParameter = $this->page['detailsUrlParameter'] = $this->property('detailsUrlParameter');

        $detailsPage = $this->property('detailsPage');
        if ($detailsPage == '-') {
            $detailsPage = null;
        }

        $this->detailsPage = $this->page['detailsPage'] = $detailsPage;



        if (strlen($this->detailsPage)) {
            if (!strlen($this->detailsKeyColumn)) {
                throw new SystemException('The details key column should be set to generate links to the details page.');
            }

            if (!strlen($this->detailsUrlParameter)) {
                throw new SystemException('The details page URL parameter name should be set to generate links to the details page.');
            }
        }


        if (!strlen($this->displayColumn)) {
            throw new SystemException('The display column name is not set.');
        }

        if (!strlen($this->modelKeyColumn)) {
            throw new SystemException('The model key column name is not set.');
        }
    }


    protected function loadRecord()
    {
        if (!strlen($this->identifierValue)) {
            return;
        }

        $modelClassName = $this->property('modelClass');
        if (!strlen($modelClassName) || !class_exists($modelClassName)) {
            throw new SystemException('Invalid model class name');
        }

        $model = new $modelClassName();
        return $model->where($this->modelKeyColumn, '=', $this->identifierValue)->first();
    }

    protected function sameCategory()
    {


        $modelClassName = $this->property('modelClass');
        if (!strlen($modelClassName) || !class_exists($modelClassName)) {
            throw new SystemException('Invalid model class name');
        }

        $model = new $modelClassName();
        $news = $model->where($this->modelKeyColumn, '=', $this->identifierValue)->first();
        $id = $news->id;

        $category_id = $news->category_id;
        return $model->where([
            ['category_id', '=', $category_id],
            ['id', '<>', $id],
        ])->orderBy('created_at', 'asc')->get();
    }


}
