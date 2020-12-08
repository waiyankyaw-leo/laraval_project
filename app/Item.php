<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
   protected $fillable=[
   	'codeno','name','photo','price','discount','description','brand_id','subcategory_id'
   ];
   use SoftDeletes;
   public function brand()
    {
        return $this->belongsTo('App\Brand');
    }

  public function subcategory()
    {
        return $this->belongsTo('App\Subcategory');
    }
}
