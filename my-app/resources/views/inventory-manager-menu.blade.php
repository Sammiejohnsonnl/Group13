<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Manager Menu</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            background: #343a40;
            padding-top: 20px;
            padding-left: 10px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
            margin: 10px 0;
        }

        .sidebar a:hover {
            background: #495057;
        }

        .dropdown-header {
            color: #adb5bd;
            font-size: 14px;
            padding: 5px 10px;
        }

        .dropdown-divider {
            height: 1px;
            margin: .5rem 0;
            overflow: hidden;
            background-color: #495057;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <h6 class="dropdown-header">Home</h6>
        <a href="{{ route('inventory.manager.dashboard') }}">Dashboard</a>
        <div class="dropdown-divider"></div>
        <h6 class="dropdown-header">Product Management</h6>
        <a href="{{ route('products.create') }}">Add Product</a>
        <a href="{{ route('inventory.manager.data') }}">View Inventory</a>
    </div>

    <div class="content" style="margin-left: 270px;">
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
