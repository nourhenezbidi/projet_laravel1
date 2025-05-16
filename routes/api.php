<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CompanyController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('companies', CompanyController::class);

use App\Http\Controllers\CommentController;
Route::apiResource('comments', CommentController::class);

use App\Http\Controllers\LikeController;
Route::apiResource('like', LikeController::class);

use App\Http\Controllers\MenuItemController;
Route::apiResource('menuItem', MenuItemController::class);

use App\Http\Controllers\BannerController;
Route::apiResource('Banner', BannerController::class);

use App\Http\Controllers\FooterController;
Route::apiResource('Footer', FooterController::class);

use App\Http\Controllers\HeaderController;
Route::apiResource('Header', HeaderController::class);

use App\Http\Controllers\CarouselController;
Route::apiResource('Carousel', CarouselController::class);

use App\Http\Controllers\SlideController;
Route::apiResource('slide', SlideController::class);

use App\Http\Controllers\LinkController;
Route::apiResource('link', LinkController::class);

use App\Http\Controllers\FeaturedCompanyController;
Route::apiResource('featured_company', FeaturedCompanyController::class);
