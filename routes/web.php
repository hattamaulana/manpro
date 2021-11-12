<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

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

Auth::routes();

Route::get('/preview/{view}', function($view) {
    return view($view);
});

Route::view('profile', 'profile')->name('profile');

Route::view('pengaturan', 'pengaturan')->name('pengaturan');

Route::get('/gantipassword', [DashboardController::class, 'gantipassword'])->name('ganti-password');
Route::post('/gantipasswd', [DashboardController::class, 'gantipasswd'])->name('gantipasswd');

Route::view('/', 'landing-page')->name('pengaturan');

Route::middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resources([
        'chats' => 'ChatController',
        'psikologs' => 'PsikologController'
    ]);
});
