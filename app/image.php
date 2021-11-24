<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    protected $table = "tbl_img";

    public function product()
    {
    	return $this->belongsTo('App\product','product_id','id');
    }

    public $timestamps = false;
}
