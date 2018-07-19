<?php namespace Sabah\Group\Models;

use Model;

/**
 * Model
 */
class Slider extends Model
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
    public $table = 'sabah_group_sliders';

    public $attachOne = [
        'image' => 'System\Models\File'
    ];
}
