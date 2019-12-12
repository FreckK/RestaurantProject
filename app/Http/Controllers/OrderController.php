<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    function store(Request $request)
    {
        $order = Order::create($request->all());
        return response()->json($order->id, 200);
    }

    function getByInvoice($invoice)
    {
        return response()->json(Order::where("idInvoice", $invoice)->orderBy('id', 'DESC')->get(), 200);
    }

    function getUndelivered()
    {
        $orders = 
            Order::
                join('invoice', 'order.idInvoice', '=', 'invoice.id')
                ->whereNull("invoice.close")
                ->whereNull("invoice.idCloseEmployee")
                ->where("order.delivered", false)
                ->orderBy('order.id', 'DESC')
                ->select('order.*')
                ->get();
        return response()->json($orders, 200);
    }

    function update(Request $request, $id)
    {
        $order = Order::find($id);
 
        if($order == null)
            return response()->json(false, 200);
        
        try
        {
            $result = $order->update($request->all());    
        }
        catch(\Exception $e)
        {
            return response()->json(false, 200);
        }
        return response()->json(true, 200);
    }

    function destroy($id)
    {
        $result = Order::destroy($id);
        if($result) return response()->json(true, 200);
        else return response()->json(false, 200);
    }
}
