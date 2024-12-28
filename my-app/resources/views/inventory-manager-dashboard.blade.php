@extends('layouts.app')

@section('content')
    <div class="sidebar">
        <a href="{{ route('inventory.manager.dashboard') }}">Dashboard</a>
        <a href="{{ route('inventory.manager.data') }}">View Inventory</a>
        <a href="{{ route('products.create') }}">Add Product</a>
    </div>

    <div class="content">
        <h2>Inventory Manager Dashboard</h2>

        <div class="card mb-3">
            <div class="card-header">Total Orders</div>
            <div class="card-body">
                <p>{{ $totalOrders }}</p>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header">Products Inventory</div>
            <div class="card-body">
                <p>{{ $productsInventory }}</p>
            </div>
        </div>

        <!-- Add more cards for additional statistics as needed -->

    </div>
@endsection
