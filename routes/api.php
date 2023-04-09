<?php

declare(strict_types=1);

use App\Http\Controllers\Api\Articles\GetArticleController;
use App\Http\Controllers\Api\Articles\ListArticlesController;
use App\Http\Controllers\Api\Articles\StoreArticleController;
use App\Http\Controllers\Api\Auth\AuthenticateUserController;
use Illuminate\Support\Facades\Route;

Route::post('/auth/authenticate', AuthenticateUserController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('/articles')->group(function () {
        Route::get('/', ListArticlesController::class);
        Route::post('/', StoreArticleController::class);
        Route::get('/{uuid}', GetArticleController::class);
    });
});
