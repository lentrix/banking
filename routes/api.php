<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ClientController;
use App\Models\Client;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', function(){
    $res = [
        'status' => 'OK',
        'message' => 'Welcome to my awesome API'
    ];

    return response()->json($res);
});

Route::get('/clients/{client}', [ClientController::class, 'view']);
Route::patch('/clients/{client}', [ClientController::class, 'update']);
Route::put('/clients/{client}', [ClientController::class, 'update']);
Route::delete('/clients/{client}', [ClientController::class, 'destroy']);
Route::get('/clients', [ClientController::class, 'index']);
Route::post('/clients',[ClientController::class, 'store']);

Route::get('/accounts/{account}', [AccountController::class, 'view']);
Route::get('/accounts', [AccountController::class, 'index']);







Route::post('/multiply', function(Request $request) {
    if(!$request->num1 || !$request->num2)
        return response()->json([
            'status' => 'Error',
            'message' => 'Invalid entry',
            'payload' => $request->all()
        ],500);

    $product = $request->num1 * $request->num2;

    return response()->json([
        'status'=>'success',
        'product'=>$product
    ]);
});
