<?php

declare(strict_types=1);

use App\Http\Controllers\Articles\GetArticleController;
use App\Http\Controllers\Articles\ListArticlesController;
use App\Http\Controllers\Articles\StoreArticleController;
use App\Http\Controllers\Articles\UpdateArticleController;
use App\Http\Controllers\Auth\AuthenticateUserController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', IndexController::class);

Route::post('/auth/authenticate', AuthenticateUserController::class);

Route::prefix('/articles')->group(function () {
    Route::get('/', ListArticlesController::class);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('/articles')->group(function () {
        Route::post('/', StoreArticleController::class);
        Route::get('/{uuid}', GetArticleController::class);
        Route::put('/{uuid}', UpdateArticleController::class);
    });
});
