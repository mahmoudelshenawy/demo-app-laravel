<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'index']);
Route::get('/get_sub_categories/{id}', [ProductController::class, 'getSubCategories']);
Route::post('/products', [ProductController::class, 'store']);
