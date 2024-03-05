<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController, PdfgeneratorController, HistoryController, ClientController, doneController};
use App\Http\Controllers\UserController;
use App\Http\Controllers\MirkazController;
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


////Auth
Auth::routes();

Route::get('/clear-cache', function() {
    
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('optimize:clear');
    
    return 'Cache Cleared Successfully';
});

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/invitaion', [MirkazController::class, 'invitaion'])->name('invitaion')->middleware(['auth:web']);
Route::get('/invitaion/{token}', [MirkazController::class, 'show'])->name('guest-details');
Route::post('/invitaion/store', [MirkazController::class, 'store'])->name('guest-details-store');
Route::get('/whatsapp_invitaion', [MirkazController::class, 'whatsapp_invitaion']);

Route::get('/qr-code', [HomeController::class, 'qrCode'])->name('qr-code');
Route::get('/qr_code_scanner/{qrCode}', [HomeController::class, 'qr_code_scanner'])->name('qr-code-scanner');

Route::post('/whatsapp_hook', [MirkazController::class, 'whatsapp_hook'])->withoutMiddleware(['csrf','web']);