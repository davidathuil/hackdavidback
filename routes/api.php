<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfilPageController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/me', [AuthController::class, 'me'])->middleware('auth:sanctum');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::post('/admin/newusers', [UserController::class, 'store']);
//route::get('/ProfilPages', [ProfilPageController::class, 'index'])->name('profilPages.index');
route::post('/ProfilPages', [ProfilPageController::class, 'store'])->name('profilPages.store');
route::post('/ProfilPages', [ProfilPageController::class, 'show'])->name('profilPages.show');
