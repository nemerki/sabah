<?php namespace Sabah\Student\Models;

use Model;

/**
 * Model
 */
class AbroadStudy extends Model
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
    public $table = 'sabah_student_abroad_studies';

    public $attachOne = [
        'image' => 'System\Models\File'
    ];
}
