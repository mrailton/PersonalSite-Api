<?php

use App\Http\Controllers\Api\Auth\AuthenticateUserController;
use Illuminate\Support\Facades\Route;

Route::post('/auth/authenticate', AuthenticateUserController::class);
