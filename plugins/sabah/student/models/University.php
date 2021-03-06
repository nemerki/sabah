<?php namespace Sabah\Student\Models;

use Model;

/**
 * Model
 */
class University extends Model
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
    public $table = 'sabah_student_universities';

    protected $jsonable = ['ixtisas', 'person'];

    public $attachOne = [
        'logo' => 'System\Models\File'
    ];

    public $morphedByMany = [
        'news'  => ['Sabah\News\Models\News', 'name' => 'sabah_news_taggable'],

    ];
}
