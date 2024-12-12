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
            <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search Staff Member"
                aria-label="Search">
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

    <div class="content">
        <h4>Staff Members:</h4>
        @foreach ($staffs->chunk(5) as $staffChunk)
            <div class="row">
                @foreach ($staffChunk as $staff)
                    <div class="col-md-3">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $staff->first_name }} {{ $staff->last_name }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $staff->role }} / {{ $staff->branch }}</h6>
                                <p class="card-text">{{ $staff->email }}</p>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#staffModal" data-id="{{ $staff->id }}"
                                    data-firstname="{{ $staff->first_name }}" data-lastname="{{ $staff->last_name }}"
                                    data-email="{{ $staff->email }}" data-role="{{ $staff->role }}">
                                    View Profile
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
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
                        <input type="text" class="form-control" id="modalFirstNameInput" name="first_name"
                            value="Loading...">
                    </div>
                    <div class="mb-3">
                        <label for="modalLastNameInput" class="form-label"><strong>Last Name:</strong></label>
                        <input type="text" class="form-control" id="modalLastNameInput" name="last_name"
                            value="Loading...">
                    </div>
                    <div class="mb-3">
                        <label for="modalEmailInput" class="form-label"><strong>Email:</strong></label>
                        <input type="email" class="form-control" id="modalEmailInput" name="email" value="Loading...">
                    </div>
                    <div class="mb-3">
                        <label for="modalRoleInput" class="form-label"><strong>Role:</strong></label>
                        <input type="text" class="form-control" id="modalRoleInput" name="role" value="Loading...">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="updateStaffButton" class="btn btn-success" data-id="">Update</button>
                    <form id="updateStaffForm" action="" method="POST" style="display: none;">
                        @csrf
                        {{ method_field('PATCH') }}
                        <input type="text" name="first_name" hidden>
                        <input type="text" name="last_name" hidden>
                        <input type="email" name="email" hidden>
                        <input type="text" name="role" hidden>
                    </form>

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
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButton = document.getElementById('deleteStaffButton');
        const deleteForm = document.getElementById('deleteStaffForm');
        const updateButton = document.getElementById('updateStaffButton');
        const updateForm = document.getElementById('updateStaffForm');

        deleteButton.addEventListener('click', function() {
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

        updateButton.addEventListener('click', function() {
            const staffId = updateButton.getAttribute('data-id');
            const firstName = document.getElementById('modalFirstNameInput').value;
            const lastName = document.getElementById('modalLastNameInput').value;
            const email = document.getElementById('modalEmailInput').value;
            const role = document.getElementById('modalRoleInput').value;

            if (staffId) {
                updateForm.action = `/staff/${staffId}`;

                updateForm.querySelector('input[name="first_name"]').value = firstName;
                updateForm.querySelector('input[name="last_name"]').value = lastName;
                updateForm.querySelector('input[name="email"]').value = email;
                updateForm.querySelector('input[name="role"]').value = role;

                updateForm.submit();
            } else {
                alert('Staff ID is not set!');
            }
        });


        const staffModal = document.getElementById('staffModal');
        staffModal.addEventListener('show.bs.modal', function(event) {
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
