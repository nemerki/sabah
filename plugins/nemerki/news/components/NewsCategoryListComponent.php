<?php namespace Nemerki\News\Components;

use Cms\Classes\ComponentBase;
use Sabah\News\Models\Category;

class NewsCategoryListComponent extends ComponentBase
{


    /**
     * @var Collection A collection of categories to display
     */
    public $categories;

    /**
     * @var string Reference to the page name for linking to categories.
     */
    public $categoryPage;

    /**
     * @var string Reference to the current category slug.
     */
    public $currentCategorySlug;

    public function componentDetails()
    {
        return [
            'name' => 'Category list',
            'description' => 'bütün kategorileri listeler'
        ];
    }

    public function defineProperties()
    {

        return [

        ];
    }


    public function onRun()
    {

        $this->categories = $this->page['categories'] = $this->loadCategories();
    }

    /**
     * Load all categories or, depending on the <displayEmpty> option, only those that have blog posts
     * @return mixed
     */
    protected function loadCategories()
    {

        return $categories = Category::all();

    }


}
