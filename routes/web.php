<?php

use App\Chat;
use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuestController;
use Illuminate\Http\Request;

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

Route::get('/', [GuestController::class, 'index']);

// Chatting
Route::get('/chat', [GuestController::class, 'chatting']);
Route::post('/chat', [GuestController::class, 'storeChat'])->name('chat.init');
Route::get('/register/consult', [GuestController::class, 'registerConsult']);
Route::post('/register/consult', [GuestController::class, 'storeConsultation'])->name('store.consult');

Route::middleware('auth')->group(function () {
    Route::view('profile', 'profile')->name('profile');

    Route::view('pengaturan', 'pengaturan')->name('pengaturan');
    Route::get('/gantipassword', [DashboardController::class, 'gantipassword'])->name('ganti-password');
    Route::post('/gantipasswd', [DashboardController::class, 'gantipasswd'])->name('gantipasswd');

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resources([
        'chats'     => 'ChatController',
        'psikologs' => 'PsikologController',
        'consult'   => 'ConsultController'
    ]);
});
