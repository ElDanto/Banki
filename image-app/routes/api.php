<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/images', [ApiController::class, 'index']);
Route::get('/images/{image}', [ApiController::class, 'show']);

