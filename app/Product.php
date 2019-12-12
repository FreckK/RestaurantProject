<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = "product";
    protected $fillable = ["name", "price", "destination"];
    protected $hidden = ['created_at', 'updated_at'];
    
    function products()
    {
        return $this->hasMany('App\Product');
    }
}
