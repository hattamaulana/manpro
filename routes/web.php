<?php

use App\Chat;
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


Route::get('/chat', function() {
    return view('chat');
});

Route::post('/chat', function(Request $request) {
    $chat = Chat::create([
        'token' => $request->input('_token'),
        'username' => $request->input('username')
    ]);

    return response()->json([
        $chat->id
    ]);
})->name('chat.init');

Route::get('/', [GuestController::class, 'index']);

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
