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
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search Product" aria-label="Search">
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
                  <h5 class="card-text">{{ $product->name }}<i class="fa-solid fa-plus"
                  type= button
                  class="btn btn-primary" 
                  data-bs-toggle="modal" 
                  data-bs-target="#productModal"
                  data-name="{{ $product->name}}">
                  </i></h5>
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

    <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalTitle">Product Details</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="modalName" class="form-label"><strong>Name:</strong></label>
        </div>
        <div class="mb-3">
          <label for="modalImage" class="form-label"><strong>Image:</strong></label>
        </div>
        <div class="mb-3">
          <label for="modalStockAvailable" class="form-label"><strong>Stock Available:</strong></label>
        </div>
        <div class="mb-3">
          <label for="modalStockData" class="form-label"><strong>Buying trends for this product:</strong></label>
        </div>
      </div>
    </div>
  </div>
</div>

  <div class="container-side">
    <div class="p-4 bg-light border rounded shadow ">
    <h4>Data:</h4>
</div>

</body>
</html>

@endsection

<script>
document.addEventListener('DOMContentLoaded', () => {
  const productModalId = document.getElementById('productModal');

  productModalId.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;

    const Name = button.getAttribute('data-name');
    const Image = button.getAttribute('data-image');
    const email = button.getAttribute('data-email');
    const role = button.getAttribute('data-role');

    document.getElementById('modalName').value = Name;
    document.getElementById('modalImage').value = Image;
    document.getElementById('modalEmailInput').value = email;
    document.getElementById('modalRoleInput').value = role;
  });
});
</script>
