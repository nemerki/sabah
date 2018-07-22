<?php namespace Sabah\Group\Models;

use Model;

/**
 * Model
 */
class Testimonial extends Model
{
    use \October\Rain\Database\Traits\Validation;

    use \October\Rain\Database\Traits\SoftDelete;

    use \October\Rain\Database\Traits\Sortable;
    const SORT_ORDER = 'sort_order';

    protected $dates = ['deleted_at'];

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'sabah_group_testimonials';

    public $attachOne = [
        'image' => 'System\Models\File'
    ];
}
