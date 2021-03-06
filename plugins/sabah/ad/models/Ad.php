<?php namespace Sabah\Ad\Models;

use Model;

/**
 * Model
 */
class Ad extends Model
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
    public $table = 'sabah_ad_ads';

    public $belongsTo = [
        'category' => ['Sabah\Ad\Models\Category']
    ];

}
