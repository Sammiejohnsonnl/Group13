@extends('layouts.app')

@section('content')
    @include('inventory-manager-menu')
    <header class="mb-4 text-center">
        <h1 style="text-align: center;">Inventory Manager Dashboard</h1>
    </header>
    <div class="header-icons">
        <a href="{{ route('notification') }}"><i class="fa-regular fa-bell"></i></a>
        <i class="fa-regular fa-user header-icons"></i>
    </div>


    <div class="content">
        <h3>Products Overview</h3>
        <div class="row">
            <div class="col-sm-6 d-flex align-items-stretch">
                <div class="card stats-card products-card flex-fill">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <h5 class="card-title">Total Orders</h5>
                        <p class="card-text">{{ $totalOrders }}</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 d-flex align-items-stretch">
                <div class="card stats-card orders-card flex-fill">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <h5 class="card-title">Products Inventory</h5>
                        <p>{{ $productsInventory }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
