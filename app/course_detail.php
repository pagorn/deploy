<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class course_detail extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'course_details';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['department_id', 'course_id', 'group_id','category_id','sum_credit_coures','sum_credit_group','sum_credit_category'];

    
}
