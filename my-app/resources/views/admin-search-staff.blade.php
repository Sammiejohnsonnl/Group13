@extends('layouts.app')

@section('content')

@include('admin-menu')

<header>
  <h1>Staff Members</h1>
  <div class="header-icons">
    <a href="{{ route('notification') }}"><i class="fa-regular fa-bell"></i></a>
    <i class="fa-regular fa-user header-icons"></i>
  </div>
</header>

<div class="admin-searchbar">
  <form class="form-inline my-2 my-lg-0" method="get" action="{{ route('admin.searchStaff') }}">
    <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search Staff Member" aria-label="Search">
    <select class="form-control form-control-sm select-size" name="role">
      <option value="">Role</option>
      <option value="Admin">Admin</option>
      <option value="Inventory Manager">Inventory Manager</option>
    </select>
    <select class="form-control form-control-sm select-size" name="branch">
      <option value="">Branch</option>
      <option value="Sheffield">Sheffield</option>
      <option value="Leeds">Leeds</option>
    </select>
    <button class="btn btn-primary" type="submit">Search</button>
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
                <h6 class="card-subtitle mb-2 text-muted">{{ $staff->role }} / {{ $staff->branch }}</h6>
                <p class="card-text">{{ $staff->email }}</p>
                <button 
                  type="button" 
                  class="btn btn-primary" 
                  data-bs-toggle="modal" 
                  data-bs-target="#staffModal"
                  data-id="{{ $staff->id }}"
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
        <form id="updateStaffForm" action="" method="POST" style="display: none;">
          @csrf
          {{ method_field('PATCH') }}
          <input type="hidden" name="first_name" id="hiddenFirstName">
          <input type="hidden" name="last_name" id="hiddenLastName">
          <input type="hidden" name="email" id="hiddenEmail">
          <input type="hidden" name="role" id="hiddenRole">
        </form>
        <button type="button" id="updateStaffButton" class="btn btn-success">Update</button>
        <button type="button" id="deleteStaffButton" class="btn btn-danger" data-id="">Delete</button>
        <form id="deleteStaffForm" action="" method="POST" style="display: none;">
          @csrf
          {{ method_field('DELETE') }}
        </form>
      </div>
    </div>
  </div>
</div>

@endsection

<script>
document.addEventListener('DOMContentLoaded', function () {
    const deleteButton = document.getElementById('deleteStaffButton');
    const deleteForm = document.getElementById('deleteStaffForm');

    deleteButton.addEventListener('click', function () {
        const staffId = deleteButton.getAttribute('data-id');
        if (staffId) {
            deleteForm.action = `/staff/${staffId}`;
            if (confirm('Are you sure you want to delete this staff member?')) {
                deleteForm.submit();
            }
        } else {
            alert('Staff ID is not set!');
        }
    });

    const staffModal = document.getElementById('staffModal');
    staffModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const staffId = button.getAttribute('data-id');
        const firstName = button.getAttribute('data-firstname');
        const lastName = button.getAttribute('data-lastname');
        const email = button.getAttribute('data-email');
        const role = button.getAttribute('data-role');

        document.getElementById('modalFirstNameInput').value = firstName;
        document.getElementById('modalLastNameInput').value = lastName;
        document.getElementById('modalEmailInput').value = email;
        document.getElementById('modalRoleInput').value = role;

        deleteButton.setAttribute('data-id', staffId);
        updateButton.setAttribute('data-id', staffId);
    });
});

</script>
