<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class MatchModel extends Model
{
    //
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'matches';
    protected $guarded = ['id'];
    protected $primaryKey="id";
    public function recieverDetails(){
        return $this->belongsTo('App\Models\ClientModel', "client","user_id");
    }
    public function pledgerMarker(){
        return $this->belongsTo('App\Models\PledgeModel', "pledge","id");
    }


}
