<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('hello', function () {
    return 'hello';
});

Route::get('world', function () {
    return 'world';
});

Route::get('foo', 'FooController@index');
Route::get('foo/create', 'FooController@create');
// Route::resource('employees', 'EmployeeApiController');

Route::resource('employees', 'EmployeeApiController', [
    'except' => ['create', 'edit']
]);

Route::group(['prefix' => 'api'], function() {
    Route::resource('employees', 'EmployeeApiController', [
        'except' => ['create', 'edit']
    ]);
});

//===========================04=============================
Route::resource('employee', 'EmployeeController');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
