<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class grade extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'grades';

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
    protected $fillable = ['student_id', 'department_id', 'course_id', 'group_id','category_id','subject_name','subject_credit','subject_id','grade1','grade2','grade3','grade4','grade5'];

    public function manage_course(){
        return $this->hasMany(manage_course::class);
    }


    
}
