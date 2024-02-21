<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/gurus', [GuruController::class, 'index']);
Route::post('/gurus/store', [GuruController::class, 'store']);
Route::get('/gurus/{id}', [GuruController::class, 'show']);
Route::patch('/gurus/{id}/update', [GuruController::class, 'update']);
Route::delete('/gurus/{id}/delete', [GuruController::class, 'destroy']);
Route::get('/gurus/show/trash', [GuruController::class, 'trash']);
Route::get('/gurus/trash/restore/{id}', [GuruController::class, 'restore']);
Route::get('/gurus/trash/delete/permanent/{id}', [GuruController::class, 'permanentDelete']);
