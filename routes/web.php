<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\JokeeController;



Route::get('/',[JokeeController::class,'displayJokee']);
Route::post('/',[JokeeController::class,'saveJokee']);
