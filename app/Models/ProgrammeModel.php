<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ProgrammeModel extends Model
{
    //
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tpoly_programme';
    
    protected $primaryKey="ID";
    protected $guarded = ['ID','PROGRAMMECODE'];
    public $timestamps = false;
    public function departments(){
        return $this->belongsTo('App\Models\DepartmentModel', "DEPTCODE","ID");
    }
     
}
