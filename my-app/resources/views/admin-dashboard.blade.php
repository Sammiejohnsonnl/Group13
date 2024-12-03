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
    <div class="col-md-3">
      <div class="data-box">User Registered: {{ $totalUsers }}</div>
    </div>
    <div class="col-md-3">
      <div class="data-box">Total Orders</div>
    </div>
    <div class="col-md-3">
      <div class="data-box">Revenue</div>
    </div>
  </div>
</div>

<div class="content">
  <h3>Today's Top Selling Products</h3>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product</th>
      <th scope="col">Profit</th>
      <th scope="col">Stock</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Product A</td>
      <td>$500</td>
      <td>50</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Product B</td>
      <td>$300</td>
      <td>30</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Product C</td>
      <td>$200</td>
      <td>20</td>
    </tr>
  </tbody>
</table>
</div>

@endsection
