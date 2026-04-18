<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\InquiryAdminController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use App\Http\Controllers\ServiceController;
use App\Models\Service;

// ADMIN
Route::get('/admin/services', [ServiceController::class, 'adminIndex'])->name('admin.services');

// FRONTEND
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{service}', [ServiceController::class, 'show'])->name('services.show');

// CRUD
Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
Route::put('/services/{service}', [ServiceController::class, 'update'])->name('services.update');
Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');


Route::get('/admin/products', [ProductController::class, 'adminIndex']);
Route::post('/admin/products/update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::post('/admin/products/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
Route::post('/admin/products/bulk-delete', [ProductController::class, 'bulkDelete'])->name('product.bulk.delete');
Route::post('/admin/products/bulk-store', [ProductController::class, 'bulkStore'])->name('product.bulk.store');
Route::post('/admin/products/import-csv', [ProductController::class, 'importCSV'])->name('product.import.csv');

Route::get('/admin/products/create', function () {
    return view('admin.products.create');
})->middleware('auth')->name('product.create');

// frontend
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.show');

// admin
Route::post('/admin/products', [ProductController::class, 'store'])->name('product.store');


Route::get('/', function () {
    $products = Product::latest()->take(10)->get();
    $services = Service::latest()->take(10)->get(); // ✅ ADD THIS

    return view('index', compact('products','services')); // ✅ ADD services
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

Route::get('/admin/products/sample-csv', function () {

    $fileName = "sample_products.csv";

    $headers = [
        "Content-Type" => "text/csv",
        "Content-Disposition" => "attachment; filename=$fileName",
    ];

    $callback = function () {
        $file = fopen('php://output', 'w');

        // Header
        fputcsv($file, ['name', 'description', 'image', 'pdf']);

        // Sample row
        fputcsv($file, ['Wall Cutter', 'Heavy machine', 'wall.jpg', 'file.pdf']);
        fputcsv($file, ['Drill Pro', 'Industrial drill', 'drill.png', '']);

        fclose($file);
    };

    return response()->stream($callback, 200, $headers);

})->name('product.sample.csv');