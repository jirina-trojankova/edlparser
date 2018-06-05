<?php

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
use Illuminate\Http\Request;

//  Route::get('/', function () {
//      return view('welcome');
//  });

Route::get('/', 'UploadController@index');
Route::post('store', 'UploadController@store');



// Route::post('/process', function (Request $request) {
//     $path = $request->file('photo')->store('photos');

//     dd($path);
// });
