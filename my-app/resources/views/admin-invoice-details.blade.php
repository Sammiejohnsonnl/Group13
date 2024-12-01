@extends('layouts.app')

@section('content')

@include('admin-menu')

<header>
    <h1>Inventory</h1>
    <div class="header-icons">
        <a href="{{ route('notification') }}"><i class="fa-regular fa-bell"></i></a>
        <i class="fa-regular fa-user header-icons"></i>
    </div>
</header>
<div class="content">
    <h3>Invoices</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Products</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
                <th scope="col">Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($Orders as $index => $Order)
                <tr>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
