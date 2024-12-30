@extends('inventory-manager-menu')

@section('content')
    <div class="container">
        <h2>Pending Orders</h2>
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
                            <td>{{ $order->customer->name }}</td>
                            <td>{{ $order->product->name }}</td>
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
