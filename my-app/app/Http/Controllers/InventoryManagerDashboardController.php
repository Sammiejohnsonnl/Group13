<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class InventoryManagerDashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalStock = Product::sum('stock');
        $lowStockItems = Product::where('stock', '<', 10)->count(); // threshold for low stock

        return view('inventory-manager-dashboard', compact('totalProducts', 'totalStock', 'lowStockItems'));
    }
}
