<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegisteredCustomer;
use App\Models\Order;

class AdminDashboardController extends Controller
{
    public function dashboard()
    {
        $totalUsers = RegisteredCustomer::count();
        $totalOrders = Order::count();
        $revenue = Order::sum('total');

        return view('admin-dashboard', compact('totalUsers', 'totalOrders', 'revenue'));
    }
}
