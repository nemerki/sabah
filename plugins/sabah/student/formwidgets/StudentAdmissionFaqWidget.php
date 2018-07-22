<?php namespace Sabah\Student\FormWidgets;

use Backend\Classes\FormWidgetBase;

/**
 * StudentAdmissionFaqWidget Form Widget
 */
class StudentAdmissionFaqWidget extends FormWidgetBase
{


    /**
     * @inheritDoc
     */
    protected $defaultAlias = 'sabah_student_student_admission_faq_widget';

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
        return $this->makePartial('studentadmissionfaqwidget');
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
        $this->addCss('css/studentadmissionfaqwidget.css', 'Sabah.Student');
        $this->addJs('js/studentadmissionfaqwidget.js', 'Sabah.Student');
    }

    /**
     * @inheritDoc
     */
    public function getSaveValue($value)
    {
        $this->model->create(['sort_id'=>$this->getId()]);
    }
}
