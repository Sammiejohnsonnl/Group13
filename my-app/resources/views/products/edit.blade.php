@extends('inventory-manager-menu')

@section('content')
    <div class="container">
        <h2>Edit Product</h2>

        <form action="{{ route('products.update', $product->id) }}" method="POST">
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
                <label for="quantity">Quantity:</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $product->quantity }}"
                    required>
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
                <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}"
                    required>
            </div>
            <div class="form-group">
                <label for="image_path">Image Path (URL):</label>
                <input type="text" class="form-control" id="image_path" name="image_path"
                    value="{{ $product->image_path }}">
            </div>
            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>
@endsection
