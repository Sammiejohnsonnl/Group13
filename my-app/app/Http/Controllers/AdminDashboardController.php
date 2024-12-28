<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegisteredCustomer;
use App\Models\Order;
use App\Models\Product;

class AdminDashboardController extends Controller
{
    public function dashboard()
    {
        $totalUsers = RegisteredCustomer::count();
        $totalOrders = Order::count();
        $productsInventory = Product::sum('total'); // Added variable
        $revenue = Order::sum('total');

        return view('admin-dashboard', compact('totalUsers', 'totalOrders', 'productsInventory', 'revenue'));
    }

    public function viewInventory()
    {
        $totalOrders = Order::count(); // Ensure total orders count is passed
        $productsInventory = Product::sum('total'); // Ensure products inventory is passed
        $products = Product::all();

        return view('admin-inventory-data', compact('products', 'totalOrders', 'productsInventory'));
    }
}
