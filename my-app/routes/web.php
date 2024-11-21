<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StaffController;
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

Route::get('/admin-create-report', function () {
    return view('admin-create-report');
})->name('admin.createReport');

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

Route::post('/staff/save', [StaffController::class, 'saveStaff'])->name('saveStaff');

Route::get('/admin-search-staff', [StaffController::class, 'viewStaff'])->name('admin.searchStaff');

Route::get('/admin-inventory-data', [ProductController::class, 'viewProduct'])->name('admin.viewInventory');

Route::get('/admin-search-staff', [StaffController::class, 'searchStaff'])->name('admin.searchStaff');

Route::delete('/staff/{staff}', [StaffController::class, 'destroy'])->name('staff.destroy');







