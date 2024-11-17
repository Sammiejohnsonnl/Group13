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

<div class="admin-searchbar">
  <form class="form-inline my-2 my-lg-0" method="get">
    <input class="form-control mr-sm-2" type="search" placeholder="Search Staff Member" aria-label="Search">
    <select class="form-control form-control-sm select-size">
      <option>Role</option>
    </select>
    <select class="form-control form-control-sm select-size">
      <option>Branch</option>
    </select>
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
                <button 
                  type="button" 
                  class="btn btn-primary" 
                  data-bs-toggle="modal" 
                  data-bs-target="#staffModal"
                  data-firstname="{{ $staff->first_name }}"
                  data-lastname="{{ $staff->last_name }}"
                  data-email="{{ $staff->email }}" 
                  data-role="{{ $staff->role }}">
                  View Profile
                </button>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @endforeach
  </div>
</div>

<div class="modal fade" id="staffModal" tabindex="-1" aria-labelledby="staffModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalTitle">Staff Details</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="modalFirstNameInput" class="form-label"><strong>First Name:</strong></label>
          <input type="text" class="form-control" id="modalFirstNameInput" value="Loading...">
        </div>
        <div class="mb-3">
          <label for="modalLastNameInput" class="form-label"><strong>Last Name:</strong></label>
          <input type="text" class="form-control" id="modalLastNameInput" value="Loading...">
        </div>
        <div class="mb-3">
          <label for="modalEmailInput" class="form-label"><strong>Email:</strong></label>
          <input type="email" class="form-control" id="modalEmailInput" value="Loading...">
        </div>
        <div class="mb-3">
          <label for="modalRoleInput" class="form-label"><strong>Role:</strong></label>
          <input type="text" class="form-control" id="modalRoleInput" value="Loading...">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger">Delete</button>
        <button type="button" class="btn btn-success">Update</button>
      </div>
    </div>
  </div>
</div>

@endsection

<script>
document.addEventListener('DOMContentLoaded', () => {
  const exampleModal = document.getElementById('staffModal');

  exampleModal.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;

    const firstName = button.getAttribute('data-firstname');
    const lastName = button.getAttribute('data-lastname');
    const email = button.getAttribute('data-email');
    const role = button.getAttribute('data-role');

    document.getElementById('modalFirstNameInput').value = firstName;
    document.getElementById('modalLastNameInput').value = lastName;
    document.getElementById('modalEmailInput').value = email;
    document.getElementById('modalRoleInput').value = role;
  });
});
</script>
