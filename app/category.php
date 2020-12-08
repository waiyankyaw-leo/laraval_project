<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class category extends Model
{
	use SoftDeletes;
   protected $fillable=[
   	'name','photo',
   ];
   
   public function subcategories()
    {
        return $this->hasMany('App\Subcategory');
    }
}
