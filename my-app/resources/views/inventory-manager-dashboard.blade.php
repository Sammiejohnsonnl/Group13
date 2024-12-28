<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventory Manager | Dashboard</title>
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

        .content {
            margin-left: 260px;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <a href="#" data-toggle="collapse" data-target="#userProfile">User Profile</a>
        <div id="userProfile" class="collapse">
            <a href="#">View Profile</a>
            <a href="#">Edit Profile</a>
        </div>
        <a href="#" data-toggle="collapse" data-target="#manageGames">Manage Games</a>
        <div id="manageGames" class="collapse">
            <a href="#">Add Games</a>
            <a href="#">Remove Games</a>
        </div>
        <a href="#" data-toggle="collapse" data-target="#salesOrders">Sales & Orders</a>
        <div id="salesOrders" class="collapse">
            <a href="#">Pending Orders</a>
            <a href="#">Sales History</a>
        </div>
        <a href="#">Logout</a>
    </div>

    <div class="content">
        <h2>Inventory Manager Dashboard</h2>

        <div class="card mb-3">
            <div class="card-header">Search and Filter</div>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label for="search">Search:</label>
                        <input type="text" class="form-control" id="search" placeholder="Search for items...">
                    </div>
                    <div class="form-group">
                        <label for="filter">Filter by:</label>
                        <select class="form-control" id="filter">
                            <option>Product Type</option>
                            <option>Platform</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header">Recent Activity</div>
            <div class="card-body">
                <p>Show the most recently added or updated items in the inventory.</p>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header">Low Stock Alerts</div>
            <div class="card-body">
                <p>Highlight items that are running low and need restocking.</p>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header">Stock Levels Overview</div>
            <div class="card-body">
                <p>Display the quantities of all items in stock.</p>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header">Notifications and Alerts</div>
            <div class="card-body">
                <p>Notify when certain items need to be reordered or when there are urgent orders.</p>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header">Reports and Analytics</div>
            <div class="card-body">
                <p>Generate reports on stock levels, sales, and provide insights into sales trends.</p>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
