<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Product</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
</head>
<header class="d-flex justify-content-between align-items-center p-3 mb-3 border-bottom">
    <h1>Add New Product</h1>
    <div class="header-icons">
        <a href="{{ route('notification') }}"><i class="fa-regular fa-bell"></i></a>
        <i class="fa-regular fa-user header-icons"></i>
    </div>
</header>

<body>
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="p-4 bg-light border rounded shadow mt-4">
            <form action="{{ route('products.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Product Name:</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group mt-4">
                    <label for="category">Category:</label>
                    <input type="text" class="form-control" id="category" name="category">
                </div>
                <div class="form-group mt-4">
                    <label for="stock">Stock Level:</label>
                    <input type="number" class="form-control" id="stock" name="stock">
                </div>
                <div class="form-group mt-4">
                    <label for="price">Price:</label>
                    <input type="number" class="form-control" id="price" name="price">
                </div>
                <button type="submit" class="btn btn-primary btn-size mt-4">Submit</button>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
