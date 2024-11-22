@extends('layouts.app')

@section('content')

@include('admin-menu')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<header>
  <h1>Inventory</h1>
  <div class="header-icons"><a href="{{ route('notification') }}"><i class="fa-regular fa-bell"></i></a>
    <i class="fa-regular fa-user header-icons"></i>
  </div>

</header>
<body>


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
              <option value="Sheffield">Sheffield</option>
              <option value="Leeds">Leeds</option>
            </select>
          <button class="btn btn-primary" type="submit">Search</button>
        </form>
  </div>

  <div class="d-flex justify-content-end">
    <div class="container-side">
      <div class="p-4 bg-light border rounded shadow ">
      <h4>Products:</h4>
      
      @foreach($products->chunk(2) as $productChunk)
        <div class="row">
          @foreach ($productChunk as $product)
            <div class="col-md-6 mb-4">
              <div class="card" style="width: 18rem;">
                <div class="card-body position-relative">
                  <h5 class="card-text">{{ $product->name }}</h5>
                  <h5 class="card-text">{{ "number go up or down" }} </h5>
                  <input type="checkbox" class="position-absolute top-0 end-0 me-2 mt-2">

                </div>
              </div>
            </div>
          @endforeach
        </div>
      @endforeach

  </div>
</div>

  <div class="container-side">
    <div class="p-4 bg-light border rounded shadow ">
    <h4>Data:</h4>
</div>

</body>
</html>

@endsection

