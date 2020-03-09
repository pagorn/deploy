<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class report extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'reports';

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
    protected $fillable = ['edit1','gpa_2','sum_gpa','sum_credit','sum_gpa_1','gpa_1','count_credit_1','count_credit_2','count_credit_3','count_credit_4','count_credit_6','count_credit_7','count_credit_8','gpa_credit_1','gpa_credit_2','gpa_credit_3','gpa_credit_4','gpa_credit_6','gpa_credit_7','gpa_credit_8','gpax','student_id', 'name', 'course_id','course_name','status','ps'];

    
    
}
