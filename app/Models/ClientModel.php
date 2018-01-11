<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ClientModel extends Model
{
    //
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'clients';
    protected $guarded = ['id'];
    protected $primaryKey="id";
    public function userDetails(){
        return $this->belongsTo('App\User', "user_id","id");
    }

}
