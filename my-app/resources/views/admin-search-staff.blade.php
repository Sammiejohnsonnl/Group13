@extends('layouts.app')

@section('content')

@include('admin-menu')

<header>
  <h1>Staff Members</h1>
  <div class="header-icons">
    <i class="fa-regular fa-bell"></i>
    <i class="fa-regular fa-user"></i>
  </div>
</header>

<body>
  <div class="admin-searchbar">
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search Staff Member" aria-label="Search">
    </form>
  </div>

  <div class="container">
    <div class="p-4 bg-light border rounded shadow">
      <h4>Staff Members:</h4>
      
      @foreach($staffs->chunk(3) as $staffChunk)
        <div class="row">
          @foreach ($staffChunk as $staff)
            <div class="col-md-4 mb-4">
              <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">{{ $staff->first_name }} {{ $staff->last_name }}</h5>
                  <h6 class="card-subtitle mb-2 text-muted">{{ $staff->role }}</h6>
                  <p class="card-text">{{ $staff->email }}</p>
                  <a href="" class="card-link">View Profile</a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      @endforeach
    </div>
  </div>

</body>

@endsection
