<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subgroup extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'subgroups';

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
    protected $fillable = ['group_id', 'group_name', 'category_id'];

    
}
