<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

//Connection
Route::get('/connection', 'Connection@isConnected');

//EmployeeController
Route::post('employee', 'EmployeeController@store');
Route::get('employee/{id}', 'EmployeeController@get');
Route::get('employee/name/{name}', 'EmployeeController@getByName');
Route::put('employee/{id}', 'EmployeeController@update');
Route::post('employee/upload_image', 'EmployeeController@upload');

//InvoiceController
Route::post('invoice', 'InvoiceController@store');
Route::get('invoice/actives', 'InvoiceController@getActiveInvoices');
Route::get('invoice/inactives', 'InvoiceController@getInactiveInvoices');
Route::put('invoice/{id}', 'InvoiceController@update');
Route::get('invoice/table_in_use/{table}', 'InvoiceController@isTableInUse');
Route::get('invoice/id/{id}', 'InvoiceController@getById');

//OrderController
Route::post('order', 'OrderController@store');
Route::get('order/invoice/{id}', 'OrderController@getByInvoice');
Route::get('order/undelivered', 'OrderController@getUndelivered');
Route::put('order/{id}', 'OrderController@update');
Route::delete('order/{id}', 'OrderController@destroy');

//ProductController
Route::post('product', 'ProductController@store');
Route::get('product', 'ProductController@index');
Route::get('product/{id}', 'ProductController@show');
Route::delete('product/{id}', 'ProductController@destroy');