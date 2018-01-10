<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class FacultyModel extends Model
{
    //
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tpoly_faculty';
    
    protected $primaryKey="ID";
    protected $guarded = ['ID'];
    public $timestamps = false;
    public function faculty(){
        return $this->belongsTo('App\Models\FacultyModel', "FACCODE","ID");
    }
     
}
