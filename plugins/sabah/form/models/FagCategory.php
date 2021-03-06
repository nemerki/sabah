<?php namespace Sabah\Form\Models;

use Model;

/**
 * Model
 */
class FagCategory extends Model
{
    use \October\Rain\Database\Traits\Validation;

    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'sabah_form_faq_categories';
    protected $guarded = [];
}

