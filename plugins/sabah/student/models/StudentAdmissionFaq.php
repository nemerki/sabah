<?php namespace Sabah\Student\Models;

use Model;

/**
 * Model
 */
class StudentAdmissionFaq extends Model
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
    public $table = 'sabah_student_student_admission_faqs';
}
