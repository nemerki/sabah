<?php namespace Sabah\Group\Models;

use Model;

/**
 * Model
 */
class Partner extends Model
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
    public $table = 'sabah_group_partners';

    public $attachOne = [
        'logo' => 'System\Models\File'
    ];
}
