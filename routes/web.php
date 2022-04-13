<?php

use App\Http\Controllers\DemoController;
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

Route::get('/makeMigration',[DemoController::class,'MakeMigration']);
Route::get('/runMigration',[DemoController::class,'RunMigration']);

Route::get('/appCacheClear',[DemoController::class,'AppCacheClear']);
