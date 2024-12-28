<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin-inventory-data', compact('products'));
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

        return view('admin-inventory-data', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    public function viewProduct()
    {
        $products = Product::all();

        return view('/admin-inventory-data', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'quantity' => 'required|integer',
            'product_type' => 'required|string|max:255',
            'platform' => 'nullable|string|max:255',
            'price' => 'required|numeric',
            'stock_quantity' => 'required|integer', // Ensure stock_quantity is validated
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public');
        }

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'product_type' => $request->product_type,
            'platform' => $request->platform,
            'price' => $request->price,
            'stock_quantity' => $request->stock_quantity, // Ensure stock_quantity is saved
            'image_path' => $imagePath,
        ]);

        return redirect()->route('products.index')->with('success', 'Product added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'quantity' => 'required|integer',
            'product_type' => 'required|string|max:255',
            'platform' => 'nullable|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $product->image_path;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public');
        }

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'product_type' => $request->product_type,
            'platform' => $request->platform,
            'price' => $request->price,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
