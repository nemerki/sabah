<?php namespace Nemerki\NemerkiBuilder;

use Backend;
use System\Classes\PluginBase;

/**
 * NemerkiBuilder Plugin Information File
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
            'name'        => 'NemerkiBuilder',
            'description' => 'Oluşturulacak pluagin seçeneklerini görsel olarak seç ',
            'author'      => 'Nemerki',
            'icon'        => 'icon-wrench'
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
            'Nemerki\NemerkiBuilder\Components\RecordList' => 'RecordList',
            'Nemerki\NemerkiBuilder\Components\RecordDetails' => 'RecordDetails',
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
            'nemerki.nemerkibuilder.some_permission' => [
                'tab' => 'NemerkiBuilder',
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
            'nemerkibuilder' => [
                'label'       => 'NemerkiBuilder',
                'url'         => Backend::url('nemerki/nemerkibuilder/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['nemerki.nemerkibuilder.*'],
                'order'       => 500,
            ],
        ];
    }
}
