<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\InquiryAdminController;


Route::get('/', function () {
    return view('index');
});

Route::get('/wall-cutting', function () {
    return view('wall-cutting'); // This looks for wall-cutting.blade.php
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/login', function () {
    return view('admin.auth.login');
})->name('login');

// Register
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Login
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//contact
Route::post('/inquiry', [InquiryController::class, 'store'])->name('inquiry.store');

Route::get('/admin/inquiries', [InquiryAdminController::class, 'index'])
    ->middleware('auth')
    ->name('admin.inquiries');

Route::post('/admin/inquiry/toggle/{id}', [InquiryAdminController::class, 'toggle'])
    ->name('inquiry.toggle');

Route::get('/test-mail', function () {
    \Mail::raw('Test Email Working', function ($msg) {
        $msg->to('sayleesahane@gmail.com')
            ->subject('Test Mail');
    });

    return 'Mail Sent';
});