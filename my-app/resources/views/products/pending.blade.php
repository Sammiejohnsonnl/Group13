@extends('layouts.app')

@section('content')
    @include('inventory-manager-menu')
    <div class="container">
        <header class="mb-4 text-center">
            <h2>Pending Orders</h2>
        </header>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Order ID</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Product</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pendingOrders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>
                                @if ($order->customer)
                                    {{ $order->customer->first_name }} {{ $order->customer->last_name }}
                                @elseif ($order->unregistered_customer_name)
                                    {{ $order->unregistered_customer_name }}
                                @else
                                    Unregistered
                                @endif
                            </td>
                            <td>{{ $order->product->name ?? 'Unknown Product' }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>£{{ number_format($order->total, 2) }}</td>
                            <td>
                                <form action="{{ route('orders.process', $order->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success btn-sm">Process</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
