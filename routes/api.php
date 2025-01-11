<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::prefix('v1/mobile')->middleware(['accept.json'])->group(function (): void {
    require __DIR__ . "/Mobile/Guest/guestApi.php";
    require __DIR__ . "/Mobile/Page/pageApi.php";
});

Route::prefix('v1/spa')->middleware(['accept.json'])->group(function (): void {
    require __DIR__ . "/Spa/Page/pageApi.php";
});


Route::prefix('v1/mobile')->middleware(['accept.json', 'auth:sanctum'])->group(function (): void {
    require __DIR__ . "/Mobile/Auth/authApi.php";
});
