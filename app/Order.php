<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $table = "order";
    protected $fillable = ["idInvoice", "idProduct", "idEmployee", "units", "price", "delivered"];
    protected $hidden = ['created_at', 'updated_at'];
    
    function orders()
    {
        return $this->hasMany('App\Order');
    }
}
