<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class category extends Model
{
   protected $fillable=[
   	'name','photo',
   ];
   use SoftDeletes;
}
