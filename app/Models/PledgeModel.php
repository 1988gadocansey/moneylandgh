<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class PledgeModel extends Model
{
    //
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pledges';
    protected $guarded = ['id'];
    protected $primaryKey="id";
    public function pledgerDetails(){
        return $this->belongsTo('App\Models\ClientModel', "pledge_maker_id","id");
    }
    public function recieverDetails(){
        return $this->belongsTo('App\Models\ClientModel', "pledge_receiver_id","id");
    }

}
