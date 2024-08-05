<?php

use App\Http\Controllers\AuthController;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('/login',[AuthController::class,'login']);
Route::post('/register',[AuthController::class,'register']);

//get all tickets route 
Route::get('/tickets',function(){
    return Ticket::all();
});

Route::get('/', function(){
    return response()->json([
        'message' => 'Welcome to Laravel API',
    ],200);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
