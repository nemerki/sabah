<?php namespace Sabah\Ad\Components;


use Lang;
use Cms\Classes\Page;
use Cms\Classes\ComponentBase;
use RainLab\Builder\Classes\ComponentHelper;
use SystemException;

class AdList extends ComponentBase
{


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
            'name' => 'AdList Component',
            'description' => 'No description provided yet...'
        ];
    }

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
                'depends' => '\Sabah\Ad\Models\Ad',
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
            ],
            'take' => [
                'title' => 'Take',
                'description' => 'neçe kayıt çekilsin',
                'type' => 'string',
                'validationPattern' => '^[0-9]*$',
                'validationMessage' => 'Sadece reqem',
                'group' => 'take & skip',
            ],
            'skip' => [
                'title' => 'Skip',
                'description' => 'neçe kayıt atlansın',
                'type' => 'string',
                'validationPattern' => '^[0-9]*$',
                'validationMessage' => 'Sadece reqem',
                'group' => 'take & skip',
            ],
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

    public function getSortColumnOptions()
    {
        return ComponentHelper::instance()->listModelColumnNames();
    }


    //
    // Rendering and processing
    //

    public function onRun()
    {
        $this->prepareVars();

        $this->records = $this->page['records'] = $this->listRecords();
    }

    protected function prepareVars()
    {

        $this->pageParam = $this->page['pageParam'] = $this->paramName('pageNumber');

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
    }


    protected function listRecords()
    {


        $model = new  \Sabah\Ad\Models\Ad();

        $importantAds = $model->where('is_important', '1')->orderBy('created_at', 'DESC')->take(4)->get();
        $array = $importantAds->lists('id');


        $model = $this->sort($model);
        $model->whereNotIn('id', $array);

        $model = $this->take($model);
         $model = $this->skip($model);


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

    protected function take($model)
    {
        $take = trim($this->property('take'));
        if (!strlen($take)) {

            return $model;
        }

        if (!preg_match('/^[0-9]+$/', $take)) {
            throw new SystemException('Invalid records per page value.');
        }

        return $model->take($take);
    }

    protected function skip($model)
    {

        $skip = trim($this->property('skip'));
        if (!strlen($skip)) {

            return $model;
        }

        if (!preg_match('/^[0-9]+$/', $skip)) {
            throw new SystemException('Invalid records per page value.');
        }

        $recordsPerPage = trim($this->property('recordsPerPage'));
        if (strlen($recordsPerPage)) {

            $sortColumn = trim($this->property('sortColumn'));
            $sortDirection = trim($this->property('sortDirection'));
            if ($sortDirection !== 'desc') {
                $sortDirection = 'asc';
            }

            $news = \Sabah\Ad\Models\Ad::orderBy($sortColumn, $sortDirection)->take($skip)->get();
            $array = $news->lists('id');

            return $model->whereNotIn('id', $array);
        }

        return $model->skip($skip);
    }


    public function onPaginate()
    {


        $this->prepareVars();

        $model = new  \Sabah\Ad\Models\Ad();

        $importantAds = $model->where('is_important', '1')->orderBy('created_at', 'DESC')->take(4)->get();
        $array = $importantAds->lists('id');


        $model = $this->sort($model);
        $model->whereNotIn('id', $array);
        $model = $this->take($model);
        $model = $this->skip($model);

        $recordsPerPage = trim($this->property('recordsPerPage'));

        $perPage = post('perPage');
        $pageNumber = $perPage;


        $partialsRecords = $model->paginate($recordsPerPage, $pageNumber);


        $this->records = $this->page['partialsRecords'] = $partialsRecords;
    }

}
