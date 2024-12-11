<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InventoryManagerDashboardController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/admin-inventory-data', function () {
    return view('admin-inventory-data');
})->name('admin.viewInventory');

Route::get('/admin-dashboard', function () {
    return view('admin-dashboard');
})->name('admin.dashboard');

Route::get('/notification', function () {
    return view('notification');
})->name('notification');

Route::get('/sign-up', function () {
    return view('sign-up');
})->name('sign-up');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/staff/save', [StaffController::class, 'saveStaff'])->name('saveStaff');

Route::get('/admin-search-staff', [StaffController::class, 'viewStaff'])->name('admin.viewStaff');
Route::get('/admin-search-staff/search', [StaffController::class, 'searchStaff'])->name('admin.searchStaff');


Route::get('/admin-inventory-data', [ProductController::class, 'viewProduct'])->name('admin.viewInventory');

Route::delete('/staff/{staff}', [StaffController::class, 'destroy'])->name('staff.destroy');

Route::patch('/staff/{staff}', [StaffController::class, 'update'])->name('staff.update');

Route::get('/admin-inventory-data/search', [ProductController::class, 'searchProduct'])->name('admin.searchProduct');

Route::get('/admin-invoice-details', [OrderController::class, 'viewInvoices'])->name('admin.viewInvoices');

Route::get('/customers/{customer}', [CustomerController::class, 'show'])->name('customers.show');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::get('/products/search', [ProductController::class, 'searchProduct'])->name('products.search');
    Route::get('/inventory-manager-dashboard', [InventoryManagerDashboardController::class, 'index'])->name('inventory-manager-dashboard');
});
