<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class AcademicCalenderModel extends Model
{
    //
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tpoly_academic_settings';
    
    protected $primaryKey="ID";
    protected $guarded=array ('ID');
     public $timestamps = false;
}
