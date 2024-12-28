<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="dropdown-menu show dropdown-menu-green" aria-labelledby="dropdownMenuButton">
        <h6 class="dropdown-header">Home</h6>
        <a class="dropdown-item" href="{{ route('inventory.manager.dashboard') }}">Dashboard</a>
        <div class="dropdown-divider"></div>
        <h6 class="dropdown-header">Product Management</h6>
        <a class="dropdown-item" href="{{ route('products.create') }}">Add Product</a>
        <a class="dropdown-item" href="{{ route('inventory.manager.data') }}">View Inventory</a>
    </div>

</body>

</html>
