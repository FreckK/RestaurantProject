<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use SoftDeletes;

    protected $table = "invoice";
    protected $fillable = ["table", "open", "idOpenEmployee", "close", "idCloseEmployee", "total"];
    protected $hidden = ['created_at', 'updated_at'];
    
    function invoices()
    {
        return $this->hasMany('App\Invoice');
    }
}
