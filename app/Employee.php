<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;
    
    protected $table = "employee";
    protected $fillable = ["login", "password"];
    protected $hidden = ['created_at', 'updated_at'];
    
    function employees()
    {
        return $this->hasMany('App\Employee');
    }
}
