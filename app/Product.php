<?php


namespace App;


use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
	protected $table = 'products';

	public function Category()
    {
        return $this->hasMany('App\Category','id','category_id');
    }
}