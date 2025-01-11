<?php

use Illuminate\Support\Facades\Route;
use BasicDashboard\Mobile\Pages\Controllers\PageController;

Route::controller(PageController::class)->group(function(): void{
    Route::post('/page/index','index');
    Route::post('/page/detail','show');
});