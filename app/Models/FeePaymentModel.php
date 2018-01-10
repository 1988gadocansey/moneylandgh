<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class FeePaymentModel extends Model
{
    //
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tpoly_feedetails';
    
    protected $primaryKey="ID";
    protected $guarded = ['ID'];
    public $timestamps = false;
   public function student(){
        return $this->belongsTo('App\Models\StudentModel', "INDEXNO","INDEXNO");
    }
     public function bank(){
        return $this->belongsTo('App\Models\BankModel', "BANK","ID");
    }
     
     
}
