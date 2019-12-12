<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;

class InvoiceController extends Controller
{
    function store(Request $request)
    {
        $invoice = Invoice::create($request->all());
        return response()->json($invoice->id, 200);
    }

    function getActiveInvoices()
    {
        return response()->json(Invoice::whereNull("close")->whereNull("idCloseEmployee")->orderBy('id', 'DESC')->get(), 200);
    }

    function getInactiveInvoices()
    {
        return response()->json(Invoice::whereNotNull("close")->whereNotNull("idCloseEmployee")->orderBy('id', 'DESC')->get(), 200);
    }

    function update(Request $request, $id)
    {
        $invoice = Invoice::find($id);
 
        if($invoice == null)
            return response()->json(false, 200);
        
        try
        {
            $result = $invoice->update($request->all());    
        }
        catch(\Exception $e)
        {
            return response()->json(false, 200);
        }
        return response()->json(true, 200);
    }

    function isTableInUse($table)
    {
        $result = Invoice::whereNull("close")->whereNull("idCloseEmployee")->where("table", $table)->first();
        return response()->json($result == null ? false : true, 200);
    }

    function getById($id){
        $invoice = Invoice::find($id);
        return response()->json($invoice, 200);
    }
}
