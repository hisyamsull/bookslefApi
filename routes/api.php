<?php

use App\Http\Controllers\Api\BookController;
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
route::get('buku', [BookController::class, 'index']);
route::get('buku/{id}', [BookController::class, 'show']);
route::post('buku', [BookController::class, 'store']);
route::put('buku/{id}', [BookController::class, 'update']);
route::delete('buku/{id}', [BookController::class, 'destroy']);
