<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    function store(Request $request)
    {
        $product = Product::create($request->all());
        return response()->json($product->id, 200);
    }

    function index()
    {
        return response()->json(Product::orderBy('id', 'ASC')->get(), 200);
    }

    function show($id)
    {
        $product = Product::find($id);
 
        if($product == null)
            return response()->json([], 200);

        return response()->json($product, 200);
    }

    function destroy($id)
    {
        $result = Product::destroy($id);
        if($result) return response()->json(true, 200);
        else return response()->json(false, 200);
    }
}
