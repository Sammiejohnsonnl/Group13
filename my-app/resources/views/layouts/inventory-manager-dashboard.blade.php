<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Manager Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<header class="d-flex justify-content-between align-items-center p-3 mb-3 border-bottom">
    <h1>Inventory Manager Dashboard</h1>
    <div class="header-icons">
        <a href="{{ route('notification') }}"><i class="fa-regular fa-bell"></i></a>
        <i class="fa-regular fa-user header-icons"></i>
    </div>
</header>

<body>
    <div class="container">
        <div class="row mb-4">
            <div class="col-lg-4 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Total Products</h5>
                        <p class="card-text">{{ $totalProducts }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Total Stock</h5>
                        <p class="card-text">{{ $totalStock }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Low Stock Items</h5>
                        <p class="card-text">{{ $lowStockItems }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <a href="{{ route('products.index') }}" class="btn btn-primary btn-block">View Products</a>
            </div>
            <div class="col">
                <a href="{{ route('products.create') }}" class="btn btn-success btn-block">Add New Product</a>
            </div>
        </div>
        <form action="{{ route('products.search') }}" method="GET" class="mt-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search Products">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-secondary">Search</button>
                </div>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
