<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MarketplaceController;
use App\Http\Controllers\MarketStockController;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\FlareClient\Api;

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

Route::apiResources([
    'marketplace' => MarketplaceController::class,
    'category' => CategoryController::class,
    'product' => ProductController::class,
    'stock' =>MarketStockController::class,
]);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
