<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class manage_course extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'manage_courses';

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
    protected $fillable = ['sum_credit_category','sum_credit_group','sum_credit_coures','group_name','category_name','subject_credit','subject_name','course_name','department_name','department_id', 'course_id', 'subject_id', 'category_id', 'group_id'];

    public function grade(){
        return $this->hasMany(grade::class);
    }
    
}
