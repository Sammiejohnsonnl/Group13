@extends('layouts.app')

@section('content')
    @include('inventory-manager-menu')

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
    </div>
@endsection
