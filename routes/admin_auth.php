<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('guest')->name('admin.')->group(function () {

    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
 
    
}); 
Route::get('admin/logout', [AuthenticatedSessionController::class, 'destroy'])
                
                ->name('admin.logout')->middleware('auth');
