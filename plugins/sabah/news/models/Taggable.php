<?php namespace Sabah\News\Models;

use Model;

/**
 * Model
 */
class Taggable extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'sabah_news_taggables';

    protected $guarded = [];
}
