<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class matbangtoa extends Model
{
    protected $table = "matbang_toa";

    public function matbangcan()
    {
    	return $this->hasMany('App\matbangcan','mb_id','id');
    }

    public function product()
    {
    	return $this->belongsTo('App\product','p_id','id');
    }

    public $timestamps = false;
}
