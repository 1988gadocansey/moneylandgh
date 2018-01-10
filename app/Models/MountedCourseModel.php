<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class MountedCourseModel extends Model
{
    //
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tpoly_mounted_courses';
    
    protected $primaryKey="ID";
    protected $guarded = ['ID'];
    public $timestamps = false;
    public function course(){
        return $this->belongsTo('App\Models\CourseModel', "COURSE","ID");
    }
     public function lecturer(){
        return $this->belongsTo('App\Models\WorkerModel', "LECTURER","staffID");
    }
     
}
