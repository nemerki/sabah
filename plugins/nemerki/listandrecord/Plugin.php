<?php namespace Nemerki\ListAndRecord;

use Backend;
use System\Classes\PluginBase;

/**
 * ListAndRecord Plugin Information File
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
            'name'        => 'ListAndRecord',
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
            'Nemerki\ListAndRecord\Components\PracticeProgramsList' => 'PracticeProgramsList',
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
            'nemerki.listandrecord.some_permission' => [
                'tab' => 'ListAndRecord',
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
            'listandrecord' => [
                'label'       => 'ListAndRecord',
                'url'         => Backend::url('nemerki/listandrecord/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['nemerki.listandrecord.*'],
                'order'       => 500,
            ],
        ];
    }
}
