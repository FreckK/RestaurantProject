<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class EmployeeController extends Controller
{
    function store(Request $request)
    {
        $employee = Employee::create($request->all());
        return response()->json($employee->id, 200);
    }

    function get($id)
    {
        return response()->json(Employee::find($id), 200);
    }
    
    function getByName($name)
    {
        $employee = Employee::where('login', $name)->first();
        return response()->json($employee, 200);
    }
    
    function update(Request $request, $id)
    {
        $employee = Employee::find($id);
        
        if($employee == null)
            return response()->json(false, 200);
        
        try
        {
            $result = $employee->update($request->all());    
        }
        catch(\Exception $e)
        {
            return response()->json(false, 200);
        }
        
        return response()->json(true, 200);
    }
    
    function upload(Request $request)
    {
        if($request->hasFile('file') && $request->file('file')->isValid())
        {
            $file = $request->file('file');
            $file->move("upload/images/employees/", $file->getClientOriginalName());
            return response()->json(true, 200);
        }
        return response()->json(false, 200);
    }
}
