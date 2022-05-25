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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/service-worker.js', function () {

//     // echo asset('/js/service-worker.js');
//     // return "gafds";

//     return response(file_get_contents('http://127.0.0.1:8000/js/service-worker.js'), 200, [
//     'Content-Type' => 'text/javascript',
//     'Cache-Control' => 'public, max-age=3600',
//     ]);
// });
