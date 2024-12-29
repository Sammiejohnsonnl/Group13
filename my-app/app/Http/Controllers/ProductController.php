<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $totalOrders = Order::count();
        $productsInventory = Product::sum('stock_quantity');
        return view('admin-inventory-data', compact('products', 'totalOrders', 'productsInventory'));
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

        $totalOrders = Order::count();
        $productsInventory = Product::sum('stock_quantity');

        return view('admin-inventory-data', compact('products', 'totalOrders', 'productsInventory'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'product_type' => 'required|string|max:255',
            'platform' => 'nullable|string|max:255',
            'price' => 'required|numeric',
            'stock_quantity' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public');
        }

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'product_type' => $request->product_type,
            'platform' => $request->platform,
            'price' => $request->price,
            'stock_quantity' => $request->stock_quantity,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('products.index')->with('success', 'Product added successfully.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'product_type' => 'required|string|max:255',
            'platform' => 'nullable|string|max:255',
            'price' => 'required|numeric',
            'stock_quantity' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $product->image_path;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public');
        }

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'product_type' => $request->product_type,
            'platform' => $request->platform,
            'price' => $request->price,
            'stock_quantity' => $request->stock_quantity,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
