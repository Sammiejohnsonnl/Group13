<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin-dashboard', function () {
    return view('admin-dashboard');
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

