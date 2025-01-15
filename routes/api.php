<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoryPartController;
use App\Http\Controllers\StoryController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/story-parts', [StoryPartController::class, 'index']);
Route::post('/story-parts', [StoryPartController::class, 'store']);
Route::get('/story-parts/{id}', [StoryPartController::class, 'show']);
Route::put('/story-parts/{id}', [StoryPartController::class, 'update']);
Route::delete('/story-parts/{id}', [StoryPartController::class, 'destroy']);
Route::get('/story-parts/{id}/download', [StoryPartController::class, 'download']);
Route::get('/stories', [StoryController::class, 'index']);
Route::post('/stories', [StoryController::class, 'store']);
Route::get('/stories/{id}', [StoryController::class, 'show']);
