<?php namespace Nemerki\Instagram;

use Backend;
use System\Classes\PluginBase;

/**
 * Instagram Plugin Information File
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
            'name'        => 'Instagram',
            'description' => 'No description provided yet...',
            'author'      => 'Nemerki',
            'icon'        => 'icon-instagram'
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
            'Nemerki\Instagram\Components\Tags' => 'Tags',
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
            'nemerki.instagram.some_permission' => [
                'tab' => 'Instagram',
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
            'instagram' => [
                'label'       => 'Instagram',
                'url'         => Backend::url('nemerki/instagram/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['nemerki.instagram.*'],
                'order'       => 500,
            ],
        ];
    }
}
