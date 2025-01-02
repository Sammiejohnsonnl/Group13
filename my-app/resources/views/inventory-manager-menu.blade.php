<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Manager Menu</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="dropdown-menu show dropdown-menu-green" aria-labelledby="dropdownMenuButton">
        <h6 class="dropdown-header">Home</h6>
        <a class="dropdown-item" href="{{ route('inventory.manager.dashboard') }}">Dashboard</a>
        <div class="dropdown-divider"></div>
        <h6 class="dropdown-header">Product Management</h6>
        <a class="dropdown-item" href="{{ route('products.create') }}">Add Product</a>
        <a class="dropdown-item" href="{{ route('inventory.manager.data') }}">View Inventory</a>
        <a class="dropdown-item" href="{{ route('orders.pending') }}">Process Customer Purchases</a>
    </div>

    <div class="content" style="margin-left: 270px;">
        @yield('content')
    </div>
</body>

</html>
