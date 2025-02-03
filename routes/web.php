<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\EmployeeAuthController;

Route::get('/employee/login', [EmployeeAuthController::class, 'showLoginForm'])->name('employee.login');
Route::post('/employee/logout', [EmployeeAuthController::class, 'logout'])->name('employee.logout');
Route::post('employee/login/check', [EmployeeAuthController::class, 'login'])->name('employee.login.check');


Route::middleware('auth')->group(function () {
    Route::get('/employee/home', function () {
        return view('employee.home'); // Create this view
    })->name('employee.home');
});

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
