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
  <h3>Today's Statistics Overview</h3>
  <div class="row">
    <div class="col-md-3">
      <div class="data-box">User Registered</div>
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
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2"></td>
      <td></td>
    </tr>
  </tbody>
</table>
</div>

@endsection
