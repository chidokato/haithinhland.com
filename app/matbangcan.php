<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class matbangcan extends Model
{
    protected $table = "matbang_can";

    public function matbangtoa()
    {
    	return $this->belongsTo('App\matbangtoa','mb_id','id');
    }

    public $timestamps = false;
}
