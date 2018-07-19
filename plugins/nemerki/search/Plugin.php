<?php namespace Nemerki\Search;

use Backend;
use System\Classes\PluginBase;

/**
 * Search Plugin Information File
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
            'name'        => 'Search',
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
            'Nemerki\Search\Components\Search' => 'search',
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
            'nemerki.search.some_permission' => [
                'tab' => 'Search',
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
            'search' => [
                'label'       => 'Search',
                'url'         => Backend::url('nemerki/search/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['nemerki.search.*'],
                'order'       => 500,
            ],
        ];
    }
}
