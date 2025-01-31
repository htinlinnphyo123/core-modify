<?php

use BasicDashboard\Web\Audits\Controllers\AuditController;
use BasicDashboard\Web\Auth\Controllers\AuthController;
use BasicDashboard\Web\Dashboard\Controllers\DashboardController;
use BasicDashboard\Web\Pages\Controllers\PageController;
use BasicDashboard\Web\Roles\Controllers\RoleController;
use BasicDashboard\Web\Settings\Controllers\SettingController;
use BasicDashboard\Web\Users\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('optimize-hey-yo', function () {
    Artisan::call('optimize:clear');
    return redirect('/');
});

require __DIR__ . "/Web/Guest/guestRoute.php";
require __DIR__ . "/Web/Localization/localizationRoute.php";

Route::group(['middleware' => ['auth', 'permission.check']], function (): void {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    require __DIR__ . "/Web/User/userRoute.php";

    Route::resource('audits', AuditController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('settings', SettingController::class);
    Route::resource('pages', PageController::class);
});
Route::get('/profile', [UserController::class, 'profile'])->name('userProfile')->middleware('auth');

//for description rich editor toupload to digitalocean directly after user click and upload photo.
Route::post('upload/image', function (Request $request) {
    $path = $request->path;
    $file = $request->file('image');
    $url = uploadImageToDigitalOcean($file, $path); //get file path that store in digitalocean
    $fullURL = config('filesystems.disks.digitalocean.endpoint') . '/' . $url;
    return response()->json([
        'data' => 'succeess',
        'code' => 200,
        'url' => $fullURL,
    ]);
})->name('uploadImage');
