<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Display all products
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // form for adding a new product
    public function create()
    {
        return view('products.create');
    }

    // Store new product
    public function store(Request $request)
    {
        Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    // Display a specific product
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    // Show the form to edit an existing product
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // Update an existing product
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    // Delete an existing product
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }

    // Search for products
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

        return view('products.index', compact('products'));
    }

    // View all products (similar to index but for different users)
    public function viewProduct()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }
}

