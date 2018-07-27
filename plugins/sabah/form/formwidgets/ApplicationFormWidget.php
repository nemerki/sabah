<?php namespace Sabah\Form\FormWidgets;

use Backend\Classes\FormWidgetBase;

/**
 * ApplicationFormWidget Form Widget
 */
class ApplicationFormWidget extends FormWidgetBase
{
    /**
     * @inheritDoc
     */
    protected $defaultAlias = 'sabah_form_application_form_widget';

    /**
     * @inheritDoc
     */
    public function init()
    {
    }

    /**
     * @inheritDoc
     */
    public function render()
    {
        $this->prepareVars();
        return $this->makePartial('applicationformwidget');
    }

    /**
     * Prepares the form widget view data
     */
    public function prepareVars()
    {
        $this->vars['name'] = $this->formField->getName();
        $this->vars['value'] = $this->getLoadValue();
        $this->vars['model'] = $this->model;
        $this->vars['file'] = $this->model->file->path;
    }

    /**
     * @inheritDoc
     */
    public function loadAssets()
    {
        $this->addCss('css/applicationformwidget.css', 'Sabah.Form');
        $this->addJs('js/applicationformwidget.js', 'Sabah.Form');
    }

    /**
     * @inheritDoc
     */
    public function getSaveValue($value)
    {
        return $value;
    }
}
