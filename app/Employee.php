<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'employees';

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
    protected $fillable = ['name', 'age', 'startDate', 'departmentId'];



}
