<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('employees.home');
// });

Auth::routes();

Route::get('/', 'HomeController@home')->name('employee.home');

//Route::get('/home', 'HomeController@index')->name('home');

Route::post('employee/store', 'EmployeeController@store')->name('employee.store');
Route::get('employee/{id}/edit', 'EmployeeController@edit')->name('employee.edit');
Route::get('employee/{id}/update', 'EmployeeController@update')->name('employee.update');
Route::get('employee/{id}/delete', 'EmployeeController@destroy')->name('employee.delete');

//Ajax users page route
Route::get('employee/add', 'EmployeeController@ajaxEmployer');

Route::post('employee/nav', 'EmployeeController@ajaxEmployerNav');

Route::post('employee/nav/top', 'EmployeeController@ajaxEmployerNavTop');
