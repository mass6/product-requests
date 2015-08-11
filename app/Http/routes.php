<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect('/product-requests');
});

Route::resource('product-requests', 'ProductRequestsController');
Route::resource('product-request-lists', 'ProductRequestListsController');
Route::resource('product-proposals', 'ProductProposalsController');
//Route::resource('product-proposals', 'ProductProposalsController');