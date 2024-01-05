<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\KaryawanController;

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

Route::get('karyawan/firstJoined', [KaryawanController::class, 'firstJoined']);
Route::get('karyawan/everTookLeave', [KaryawanController::class, 'everTookLeave']);
Route::get('karyawan/remainingLeave', [KaryawanController::class, 'remainingLeave']);

Route::apiResource('karyawan', KaryawanController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});