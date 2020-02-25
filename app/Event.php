<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// 

use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    //
    protected $guarded = [];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    function places(){
        return $this->BelongsTo('App\Place', 'place_id');
    }
}
