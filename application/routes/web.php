<?php

use Illuminate\Support\Facades\DB;
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

Route::get('/users', function ()
{
    return DB::table('users')->get()->all();
});

Route::get('/redis', function ()
{
    \Illuminate\Support\Facades\Redis::set('test', rand(10,99));

    return \Illuminate\Support\Facades\Redis::get('test');
});

Route::get('/', function ()
{
    return view('welcome');
});
