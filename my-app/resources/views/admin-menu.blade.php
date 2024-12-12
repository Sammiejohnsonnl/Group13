<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="dropdown-menu show dropdown-menu-green" aria-labelledby="dropdownMenuButton">
        <h6 class="dropdown-header">Home</h6>
        <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
        <div class="dropdown-divider"></div>
        <h6 class="dropdown-header">Account Manager</h6>
        <a class="dropdown-item" href="{{ route('admin.createStaff') }}">Add staff account</a>
        <a class="dropdown-item" href="{{ route('admin.searchStaff') }}">Search staff account</a>
        <div class="dropdown-divider"></div>
        <h6 class="dropdown-header">Data Manager</h6>
        <a class="dropdown-item" href="{{ route('admin.viewInventory') }}">View inventory</a>
        <a class="dropdown-item" href="{{ route('admin.viewInvoices') }}">Invoice details</a>
    </div>
    </div>
</body>

</html>
