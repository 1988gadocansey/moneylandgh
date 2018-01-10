<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class CourseModel extends Model
{
    //
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tpoly_courses';
    
    protected $primaryKey="ID";
    protected $guarded = ['ID','COURSE_CODE'];
    public $timestamps = false;
    public function programme(){
        return $this->belongsTo('App\Models\ProgrammeModel', "PROGRAMME","PROGRAMMECODE");
    }
     
}
