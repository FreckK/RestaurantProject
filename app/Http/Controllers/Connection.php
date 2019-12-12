<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Connection extends Controller
{
    function isConnected()
    {
        return response()->json(true, 200);
    }
}
