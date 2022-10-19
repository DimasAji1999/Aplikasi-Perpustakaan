<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Produkapicontroller;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/books',[Produkapicontroller::class,'index']);
Route::post('/books',[Produkapicontroller::class,'store']);
Route::get('/books/{id}',[Produkapicontroller::class,'show']);
Route::put('/books/{id}',[Produkapicontroller::class,'update']);
Route::delete('/books/{id}',[Produkapicontroller::class,'destroy']);


