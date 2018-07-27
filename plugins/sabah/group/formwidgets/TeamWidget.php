<?php namespace Sabah\Group\FormWidgets;

use Backend\Classes\FormWidgetBase;

/**
 * TeamWidget Form Widget
 */
class TeamWidget extends FormWidgetBase
{
    /**
     * @inheritDoc
     */
    protected $defaultAlias = 'sabah_group_team_widget';

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
        dump($this->vars['name']);
        return $this->makePartial('teamwidget');
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
        $this->addCss('css/teamwidget.css', 'Sabah.Group');
        $this->addJs('js/teamwidget.js', 'Sabah.Group');
    }

    /**
     * @inheritDoc
     */
    public function getSaveValue($value)
    {
//        return $value;
        $this->model->create(['o' => $this->getId()]);
    }
}
