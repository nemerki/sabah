<?php namespace Nemerki\MyBuilder;

use Backend;
use System\Classes\PluginBase;

/**
 * myBuilder Plugin Information File
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
            'name'        => 'myBuilder',
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
            'Nemerki\MyBuilder\Components\RecordList' => 'myBuilder',
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
            'nemerki.mybuilder.some_permission' => [
                'tab' => 'myBuilder',
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
            'mybuilder' => [
                'label'       => 'myBuilder',
                'url'         => Backend::url('nemerki/mybuilder/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['nemerki.mybuilder.*'],
                'order'       => 500,
            ],
        ];
    }
}
