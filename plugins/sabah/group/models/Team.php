<?php namespace Sabah\Group\Models;

use Model;

/**
 * Model
 */
class Team extends Model
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
    public $table = 'sabah_group_teams';

    public $attachOne = [
        'image' => 'System\Models\File'
    ];

    public function getFullNameAttribute()
    {
        return $this->name . " " . $this->surname;
    }

    public function getOrderAndFullNameAttribute()
    {
        return $this->sort_order . ". " . $this->name . " " . $this->surname;
    }
}
