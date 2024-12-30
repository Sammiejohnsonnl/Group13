@extends('inventory-manager-menu')

@section('content')
    <div class="container">
        <header class="mb-4 text-center">
            <h2>Edit Product</h2>
        </header>
    </div>
    <div>
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description">{{ $product->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="product_type">Product Type:</label>
                <input type="text" class="form-control" id="product_type" name="product_type"
                    value="{{ $product->product_type }}" required>
            </div>
            <div class="form-group">
                <label for="platform">Platform (if applicable):</label>
                <input type="text" class="form-control" id="platform" name="platform" value="{{ $product->platform }}">
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}"
                    required>
            </div>
            <div class="form-group">
                <label for="stock_quantity">Stock Quantity:</label>
                <input type="number" class="form-control" id="stock_quantity" name="stock_quantity"
                    value="{{ $product->stock_quantity }}" required>
            </div>
            <div class="form-group">
                <label for="image">Product Image:</label>
                <input type="file" class="form-control" id="image" name="image">
                @if ($product->image_path)
                    <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}"
                        class="img-thumbnail mt-2" style="width: 150px;">
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>
@endsection
