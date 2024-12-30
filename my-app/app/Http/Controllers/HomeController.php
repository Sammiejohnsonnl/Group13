<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $recentProducts = Product::orderBy('created_at', 'desc')->take(5)->get();
        $games = Product::where('product_type', 'Game')->take(5)->get();
        $accessories = Product::where('product_type', 'Accessory')->take(5)->get();

        return view('home', compact('recentProducts', 'games', 'accessories'));
    }
}
