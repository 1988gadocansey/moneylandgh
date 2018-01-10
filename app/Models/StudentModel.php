<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class StudentModel extends Model
{
    //
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tpoly_students';
    
    protected $primaryKey="ID";
    protected $guarded = ['ID','INDEXNO'];
    public $timestamps = false;
    public function programme(){
        return $this->belongsTo('App\Models\ProgrammeModel', "PROGRAMMECODE","PROGRAMMECODE");
    }
    
}
