<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;

class InventoryManagerController extends Controller
{
    public function index()
    {
        $totalOrders = Order::where('status', 'processed')->count();
        $productsInventory = Product::sum('stock_quantity');
        $products = Product::all();

        return view('inventory-manager-data', compact('products', 'totalOrders', 'productsInventory'));
    }

    public function dashboard()
    {
        $totalOrders = Order::where('status', 'processed')->count();
        $productsInventory = Product::sum('stock_quantity');

        return view('inventory-manager-dashboard', compact('totalOrders', 'productsInventory'));
    }

    public function searchProduct(Request $request)
    {
        $products = Product::query();

        if ($search = $request->get('search')) {
            $products = $products->where('name', 'like', '%' . $search . '%');
        }

        if ($productType = $request->get('product_type')) {
            $products = $products->where('product_type', $productType);
        }

        if ($platform = $request->get('platform')) {
            $products = $products->where('platform', $platform);
        }

        if ($order = $request->get('order')) {
            if ($order == 'Stock') {
                $products = $products->orderBy('stock_quantity', 'asc');
            }
        }

        $products = $products->get();

        $totalOrders = Order::where('status', 'processed')->count();
        $productsInventory = Product::sum('stock_quantity');

        return view('inventory-manager-data', compact('products', 'totalOrders', 'productsInventory'));
    }

    public function destroy(Product $product)
    {
        $product->delete();

        $totalOrders = Order::where('status', 'processed')->count();
        $productsInventory = Product::sum('stock_quantity');
        $products = Product::all();

        return view('inventory-manager-data', compact('products', 'totalOrders', 'productsInventory'))
            ->with('success', 'Product deleted successfully.');
    }
}
