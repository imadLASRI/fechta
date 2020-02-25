<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Place extends Model
{
    //
    protected $guarded = [];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    // 
    function managers(){
        return $this->BelongsTo('App\User', 'manager_id');
    }
}
