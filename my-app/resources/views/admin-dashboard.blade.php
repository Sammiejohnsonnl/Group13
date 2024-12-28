@extends('layouts.app')

@section('content')
    @include('admin-menu')

    <header>
        <h1>Admin Dashboard</h1>
        <div class="header-icons">
            <a href="{{ route('notification') }}"><i class="fa-regular fa-bell"></i></a>
            <i class="fa-regular fa-user header-icons"></i>
        </div>
    </header>

    <div class="content">
        <h3>General Statistics Overview</h3>
        <div class="row">
            <div class="col-sm-3">
                <div class="card stats-card users-card">
                    <div class="card-body">
                        <h5 class="card-title">Users Registered</h5>
                        <p class="card-text">{{ $totalUsers }}</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card stats-card orders-card">
                    <div class="card-body">
                        <h5 class="card-title">Total Orders</h5>
                        <p class="card-text">{{ $totalOrders }}</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card stats-card revenue-card">
                    <div class="card-body">
                        <h5 class="card-title">Revenue</h5>
                        <p class="card-text">£{{ $revenue }}</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card stats-card inventory-card">
                    <div class="card-body">
                        <h5 class="card-title">Products Inventory</h5>
                        <p class="card-text">{{ $productsInventory }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
