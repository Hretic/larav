<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HomeController ;
use App\Http\Controllers\Api\ItemController ;
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


Route::get('/home' , [HomeController::class , 'index']) ; 
Route::get('/welcome' , [HomeController::class , 'welcome']) ; 
Route::get('/faq' , [HomeController::class , 'faq']) ; 
Route::get('/pages' , [HomeController::class , 'pages']) ; 


Route::prefix('item')->group(function () {
    Route::get('/', [ItemController::class , 'index']);
    Route::post('/store', [ItemController::class , 'store']);
    Route::post('/compelete/{item}', [ItemController::class , 'markAsCompelete']);
    Route::post('/incompelete/{item}', [ItemController::class , 'markAsInCompelete']);

    Route::put('/{item}', [ItemController::class , 'update']);
    Route::delete('/{item}', [ItemController::class , 'destroy']);
});
