<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class BankModel extends Model
{
    //
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tpoly_banks';
    
    protected $primaryKey="ID";
    protected $fillable=array ('NAME','ACCOUNT_NUMBER');
    
}
