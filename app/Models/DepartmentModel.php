<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class DepartmentModel extends Model
{
    //
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tpoly_department';
    
    protected $primaryKey="ID";
    protected $guarded = ['ID'];
    public $timestamps = false;
     
     
}
