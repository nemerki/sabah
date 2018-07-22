<?php namespace Sabah\Group\FormWidgets;

use Backend\Classes\FormWidgetBase;

/**
 * TestimonialWidget Form Widget
 */
class TestimonialWidget extends FormWidgetBase
{
    /**
     * @inheritDoc
     */
    protected $defaultAlias = 'sabah_group_testimonial_widget';

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
        dd($this->vars['id']);
        return $this->makePartial('testimonialwidget');
    }

    /**
     * Prepares the form widget view data
     */
    public function prepareVars()
    {
        $this->vars['name'] = $this->formField->getName();
        $this->vars['value'] = $this->getLoadValue();
        $this->vars['model'] = $this->model;
    }

    /**
     * @inheritDoc
     */
    public function loadAssets()
    {
        $this->addCss('css/testimonialwidget.css', 'Sabah.Group');
        $this->addJs('js/testimonialwidget.js', 'Sabah.Group');
    }

    /**
     * @inheritDoc
     */
    public function getSaveValue($value)
    {
       $this->model->create(['sort_id'=>$this->getId()]);

    }
}
