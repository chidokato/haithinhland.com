<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = "tbl_product";

    public function category()
    {
    	return $this->belongsTo('App\category','cat_id','id');
    }

    public function district()
    {
        return $this->belongsTo('App\district','dis_id','id');
    }

    public function image()
    {
    	return $this->hasMany('App\image','product_id','id');
    }

    public function matbangtoa()
    {
        return $this->hasMany('App\matbangtoa','p_id','id');
    }

    public function matbangcan()
    {
        return $this->hasManyThrough('App\matbangcan','App\matbangtoa','mb_id','p_id','id');
    }

    public $timestamps = false;
}
