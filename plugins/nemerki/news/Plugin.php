<?php namespace Nemerki\News;

use Backend;
use System\Classes\PluginBase;

/**
 * News Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'News',
            'description' => 'No description provided yet...',
            'author'      => 'Nemerki',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {

        return [
            'Nemerki\News\Components\SameCategoryNewsListComponent' => 'sameCategory',
            'Nemerki\News\Components\NewsComponent' => 'news',
            'Nemerki\News\Components\NewsCategoryListComponent' => 'categoryList',
            'Nemerki\News\Components\StudentNews' => 'studentNews',
            'Nemerki\News\Components\UniversityNews' => 'universityNews',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'nemerki.news.some_permission' => [
                'tab' => 'News',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return []; // Remove this line to activate

        return [
            'news' => [
                'label'       => 'News',
                'url'         => Backend::url('nemerki/news/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['nemerki.news.*'],
                'order'       => 500,
            ],
        ];
    }
}
