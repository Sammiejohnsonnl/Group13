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
                @foreach($ as $index => $)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td> 
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
