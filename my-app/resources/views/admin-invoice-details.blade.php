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
            @foreach($orders as $order)
                <tr>
                    <th scope="row">{{ $order->id }}</th>
                    <td>
                        <a href="{{ route('customers.show', $order->customer->id) }}">
                            {{ $order->customer->name }}
                        </a>
                    </td>
                    <td>
                        @foreach($order->products as $product)
                            <div>
                                <a href="{{ route('products.show', $product->id) }}">
                                    {{ $product->name }}
                                </a>
                            </div>
                        @endforeach
                    </td>
                    <td>
                        @foreach($order->products as $product)
                            <div>{{ $product->pivot->quantity }}</div>
                        @endforeach
                    </td>
                    <td>{{ number_format($order->total, 2) }}</td>
                    <td>{{ $order->created_at->format('Y-m-d') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
