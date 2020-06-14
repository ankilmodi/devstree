<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categoryes';


	public function children()
	{
	    return $this->hasMany('App\Category','parent_id');
	}

	public function Product() 
	{
        return $this->belongsTo('App\Product','category_id');
    }
}
