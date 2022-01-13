<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Compane;

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

Route::get('com',[Compane::class,'home']);
Route::get('comreg',[Compane::class,'addcompany']);
Route::post('comadd',[Compane::class,'save']);
Route::post('comdel',[Compane::class,'destroy']);
Route::post('comup',[Compane::class,'update']);





