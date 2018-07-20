<?php namespace Nemerki\Form;

use Backend;
use System\Classes\PluginBase;

/**
 * Form Plugin Information File
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
            'name'        => 'Form',
            'description' => 'Kullanıcıdan alınan formalrın eklenmesi ve mail gönderimi',
            'author'      => 'Nemerki',
            'icon'        => 'icon-send'
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
            'Nemerki\Form\Components\ContactForm' => 'ContactForm',
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
            'nemerki.form.some_permission' => [
                'tab' => 'Form',
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
            'form' => [
                'label'       => 'Form',
                'url'         => Backend::url('nemerki/form/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['nemerki.form.*'],
                'order'       => 500,
            ],
        ];
    }
}
