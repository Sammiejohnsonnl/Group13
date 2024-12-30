<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RegisteredCustomerController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\InventoryManagerController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin-create-staff', function () {
    return view('admin-create-staff');
})->name('admin.createStaff');

Route::get('/admin-search-staff', function () {
    return view('admin-search-staff');
})->name('admin.searchStaff');

Route::get('/admin-sales-data', function () {
    return view('admin-sales-data');
})->name('admin.viewSales');

Route::get('/admin-invoice-details', function () {
    return view('admin-invoice-details');
})->name('admin.viewInvoices');

Route::get('/admin-inventory-data', [AdminDashboardController::class, 'viewInventory'])->name('admin.viewInventory');

Route::get('/admin-dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');

Route::get('/notification', function () {
    return view('notification');
})->name('notification');

Route::get('/sign-up', function () {
    return view('sign-up');
})->name('sign-up');

Route::get('/inventory-manager-dashboard', [InventoryManagerController::class, 'dashboard'])->name('inventory-manager-dashboard');

// Login Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('user.login');
Route::post('/logout', [LoginController::class, 'logout'])->name('user.logout');

Route::get('/shopping-cart', function () {
    return view('shopping-cart');
})->name('shopping-cart');

Route::post('/staff/save', [StaffController::class, 'saveStaff'])->name('saveStaff');

Route::get('/admin-search-staff', [StaffController::class, 'viewStaff'])->name('admin.viewStaff');
Route::get('/admin-search-staff/search', [StaffController::class, 'searchStaff'])->name('admin.searchStaff');

Route::get('/admin-inventory-data/search', [ProductController::class, 'searchProduct'])->name('admin.searchProduct');

Route::get('/admin-invoice-details', [OrderController::class, 'viewInvoices'])->name('admin.viewInvoices');

Route::get('/customers/{customer}', [RegisteredCustomerController::class, 'show'])->name('customers.show');

// Products
Route::resource('products', ProductController::class);

Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// Inventory Manager View
Route::get('/inventory-manager-data', [InventoryManagerController::class, 'index'])->name('inventory.manager.data');
Route::get('/inventory-manager-dashboard', [InventoryManagerController::class, 'dashboard'])->name('inventory.manager.dashboard');

// Search route for Inventory Manager
Route::get('/inventory-manager-searchProduct', [InventoryManagerController::class, 'searchProduct'])->name('inventory.manager.searchProduct');

// Registered user Sign-Up
Route::post('/user/sign-up', [RegisteredCustomerController::class, 'userSignUp'])->name('user.signUp');


// Orders
Route::get('orders/pending', [OrderController::class, 'pending'])->name('orders.pending');

Route::put('orders/{order}/process', [OrderController::class, 'process'])->name('orders.process');
