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

    <div class="admin-searchbar">
        <form class="form-inline my-2 my-lg-0" method="get" action="{{ route('admin.searchProduct') }}">
            <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search Product" aria-label="Search">
            <select class="form-control form-control-sm select-size" name="product_type">
                <option value="">Product Type</option>
                <option value="Game">Game</option>
                <option value="Console">Console</option>
                <option value="Accessory">Accessory</option>
            </select>
            <select class="form-control form-control-sm select-size" name="platform">
                <option value="">Platform</option>
                <option value="pc">PC</option>
                <option value="xbox">Xbox</option>
                <option value="playstation">Playstation</option>
            </select>
            <select class="form-control form-control-sm select-size" name="order">
                <option value="">Order by</option>
                <option value="Stock">Stock Low to High</option>
            </select>
            <button class="btn btn-primary" type="submit">Search</button>
        </form>
    </div>

    <div class="content">
        <h3>Products</h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Product</th>
                    <th scope="col">Type</th>
                    <th scope="col">Platform</th>
                    <th scope="col">Price</th>
                    <th scope="col">Stock</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $index => $product)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->product_type }}</td>
                        <td>{{ $product->platform }}</td>
                        <td>£{{ number_format($product->price, 2) }}</td> 
                        <td>{{ $product->stock_quantity }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
