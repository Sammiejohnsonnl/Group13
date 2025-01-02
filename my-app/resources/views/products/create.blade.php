@extends('layouts.app')

@section('content')
    @include('inventory-manager-menu')
    <div class="container mt-4">
        <h1 class="text-center mb-4">Add Product</h1>
        <div class="p-4 bg-light border rounded shadow mt-4">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                </div>
                <div class="mb-3">
                    <label for="product_type" class="form-label">Product Type:</label>
                    <input type="text" class="form-control" id="product_type" name="product_type" required>
                </div>
                <div class="mb-3">
                    <label for="platform" class="form-label">Platform (if applicable):</label>
                    <input type="text" class="form-control" id="platform" name="platform">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price:</label>
                    <input type="number" class="form-control" id="price" name="price" required>
                </div>
                <div class="mb-3">
                    <label for="stock_quantity" class="form-label">Stock Quantity:</label>
                    <input type="number" class="form-control" id="stock_quantity" name="stock_quantity" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Product Image:</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary">Add Product</button>
                </div>
            </form>
        </div>
    </div>
@endsection
