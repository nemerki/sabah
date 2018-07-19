<?php namespace Nemerki\Search\Components;

use Lang;
use Cms\Classes\Page;
use Cms\Classes\ComponentBase;
use RainLab\Builder\Classes\ComponentHelper;
use Sabah\Ad\Models\Ad;
use Sabah\News\Models\News;
use SystemException;
use Exception;
use Illuminate\Support\Facades\Cache;

class Search extends ComponentBase
{
    public $searchKey;

    public $otherRecordCount;

    /**
     * A collection of records to display
     * @var \October\Rain\Database\Collection
     */
    public $records;

    /**
     * Message to display when there are no records.
     * @var string
     */
    public $noRecordsMessage;

    /**
     * Reference to the page name for linking to details.
     * @var string
     */
    public $detailsPage;

    /**
     * Specifies the current page number.
     * @var integer
     */
    public $pageNumber;

    /**
     * Parameter to use for the page number
     * @var string
     */
    public $pageParam;

    /**
     * Model column name to display in the list.
     * @var string
     */
    public $displayColumn;

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

    public function componentDetails()
    {
        return [
            'name' => 'Search Component',
            'description' => 'Axtarış üçün'
        ];
    }

    public function defineProperties()
    {
        return [
            'modelClass' => [
                'title' => 'rainlab.builder::lang.components.list_model',
                'type' => 'dropdown',
                'showExternalParam' => false
            ],

            'displayColumn' => [
                'title' => 'rainlab.builder::lang.components.list_display_column',
                'description' => 'rainlab.builder::lang.components.list_display_column_description',
                'type' => 'autocomplete',
                'depends' => ['modelClass'],
                'validation' => [
                    'required' => [
                        'message' => Lang::get('rainlab.builder::lang.components.list_display_column_required')
                    ]
                ]
            ],
            'noRecordsMessage' => [
                'title' => 'rainlab.builder::lang.components.list_no_records',
                'description' => 'rainlab.builder::lang.components.list_no_records_description',
                'type' => 'string',
                'default' => Lang::get('rainlab.builder::lang.components.list_no_records_default'),
                'showExternalParam' => false,
            ],
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
            'recordsPerPage' => [
                'title' => 'rainlab.builder::lang.components.list_records_per_page',
                'description' => 'rainlab.builder::lang.components.list_records_per_page_description',
                'type' => 'string',
                'validationPattern' => '^[0-9]*$',
                'validationMessage' => 'rainlab.builder::lang.components.list_records_per_page_validation',
                'group' => 'rainlab.builder::lang.components.list_pagination'
            ],
            'pageNumber' => [
                'title' => 'rainlab.builder::lang.components.list_page_number',
                'description' => 'rainlab.builder::lang.components.list_page_number_description',
                'type' => 'string',
                'default' => '{{ :page }}',
                'group' => 'rainlab.builder::lang.components.list_pagination'
            ],
            'sortColumn' => [
                'title' => 'rainlab.builder::lang.components.list_sort_column',
                'description' => 'rainlab.builder::lang.components.list_sort_column_description',
                'type' => 'autocomplete',
                'depends' => ['modelClass'],
                'group' => 'rainlab.builder::lang.components.list_sorting',
                'showExternalParam' => false
            ],
            'sortDirection' => [
                'title' => 'rainlab.builder::lang.components.list_sort_direction',
                'type' => 'dropdown',
                'showExternalParam' => false,
                'group' => 'rainlab.builder::lang.components.list_sorting',
                'options' => [
                    'asc' => 'rainlab.builder::lang.components.list_order_direction_asc',
                    'desc' => 'rainlab.builder::lang.components.list_order_direction_desc'
                ]
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

    public function getModelClassOptions()
    {
        return ComponentHelper::instance()->listGlobalModels();
    }

    public function getDisplayColumnOptions()
    {
        return ComponentHelper::instance()->listModelColumnNames();
    }

    public function getDetailsKeyColumnOptions()
    {
        return ComponentHelper::instance()->listModelColumnNames();
    }

    public function getSortColumnOptions()
    {
        return ComponentHelper::instance()->listModelColumnNames();
    }

    //
    // Rendering and processing
    //

    public function onRun()
    {
        if (isset($_POST['search'])) {
            $endDate = now()->addMonth(1);
            $search = strip_tags($_POST['search']);

            Cache::put('searchKey', $search, $endDate);
        }


        $this->prepareVars();

        $this->records = $this->page['records'] = $this->listRecords();

        $this->post = $this->page['post'] = Cache::get('searchKey');

        $this->crossList();


    }

    protected function crossList()
    {
        $model = $this->property('modelClass');

        if ($model == "Sabah\News\Models\News") {

            $searchKey = Cache::get('searchKey');

            $model = Ad::where('title', 'like', '%' . $searchKey . '%');
            $this->otherRecordCount = $this->page['otherRecordCount'] = $model->count();

        }

        if ($model == "Sabah\Ad\Models\Ad") {

            $searchKey = Cache::get('searchKey');

            $model = News::where('title', 'like', '%' . $searchKey . '%');
            $this->otherRecordCount = $this->page['otherRecordCount'] = $model->count();

        }
    }

    protected function prepareVars()
    {
        $this->noRecordsMessage = $this->page['noRecordsMessage'] = Lang::get($this->property('noRecordsMessage'));
        $this->displayColumn = $this->page['displayColumn'] = $this->property('displayColumn');
        $this->pageParam = $this->page['pageParam'] = $this->paramName('pageNumber');

        $this->detailsKeyColumn = $this->page['detailsKeyColumn'] = $this->property('detailsKeyColumn');
        $this->detailsUrlParameter = $this->page['detailsUrlParameter'] = $this->property('detailsUrlParameter');


        $detailsPage = $this->property('detailsPage');
        if ($detailsPage == '-') {
            $detailsPage = null;
        }

        $this->detailsPage = $this->page['detailsPage'] = $detailsPage;

        if (!strlen($this->displayColumn)) {
            throw new SystemException('The display column name is not set.');
        }

        if (strlen($this->detailsPage)) {
            if (!strlen($this->detailsKeyColumn)) {
                throw new SystemException('The details key column should be set to generate links to the details page.');
            }

            if (!strlen($this->detailsUrlParameter)) {
                throw new SystemException('The details page URL parameter name should be set to generate links to the details page.');
            }
        }
    }

    protected function listRecords()
    {
        $modelClassName = $this->property('modelClass');
        if (!strlen($modelClassName) || !class_exists($modelClassName)) {
            throw new SystemException('Invalid model class name');
        }


        $model = new $modelClassName();

        $model = $this->search($model);
        $model = $this->sort($model);
        $records = $this->paginate($model);

        return $records;
    }


    protected function paginate($model)
    {
        $recordsPerPage = trim($this->property('recordsPerPage'));
        if (!strlen($recordsPerPage)) {
            // Pagination is disabled - return all records
            return $model->get();
        }

        if (!preg_match('/^[0-9]+$/', $recordsPerPage)) {
            throw new SystemException('Invalid records per page value.');
        }

        $pageNumber = trim($this->property('pageNumber'));
        if (!strlen($pageNumber) || !preg_match('/^[0-9]+$/', $pageNumber)) {
            $pageNumber = 1;
        }

        return $model->paginate($recordsPerPage, $pageNumber);
    }

    protected function sort($model)
    {
        $sortColumn = trim($this->property('sortColumn'));
        if (!strlen($sortColumn)) {
            return $model;
        }

        $sortDirection = trim($this->property('sortDirection'));

        if ($sortDirection !== 'desc') {
            $sortDirection = 'asc';
        }

        // Note - no further validation of the sort column
        // value is performed here, relying to the ORM sanitizing.
        return $model->orderBy($sortColumn, $sortDirection);
    }


    protected function search($model)
    {

        $searchKey = Cache::get('searchKey');

        $model = $model->where('title', 'like', '%' . $searchKey . '%');
        $this->recordCount = $this->page['recordCount'] = $model->count();
        return $model;


    }


    public function onPaginate()
    {
        $this->prepareVars();
        $modelClassName = $this->property('modelClass');
        if (!strlen($modelClassName) || !class_exists($modelClassName)) {
            throw new SystemException('Invalid model class name');
        }

        $model = new $modelClassName();

        $model = $this->search($model);
        $model = $this->sort($model);
        $recordsPerPage = trim($this->property('recordsPerPage'));


        $perPage = post('perPage');
        $pageNumber = $perPage;


        $partialsRecords = $model->paginate($recordsPerPage, $pageNumber);

        $this->records = $this->page['partialsRecords'] = $partialsRecords;

    }


}
