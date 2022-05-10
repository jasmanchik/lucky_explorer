<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/users', function () {
    return DB::table('users')->get()->all();
});

Route::get('/', function () {
    return Inertia::render('Home', [
        'name' => 'George',
        'frameworks' => [
            'Laravel', 'Vue', 'Inertia'
        ]
    ]);
});
