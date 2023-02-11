<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TelegramController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

/*
*   Admin Dashboard
*/
Route::get('/admin_dashboard', function () {
    return view('layouts.admin.admin_dashboard');
})->name('admin_dashboard');

/*
*  Telegram 
*/

Route::get('/updated-activity', [TelegramController::class , 'updatedActivity']);

Route::get('/', [TelegramController::class ,'sendMessage']);
Route::post('/send-message', [TelegramController::class , 'storeMessage']);
Route::post('/store-photo', [TelegramController::class , 'storePhoto']);

require __DIR__.'/auth.php';
