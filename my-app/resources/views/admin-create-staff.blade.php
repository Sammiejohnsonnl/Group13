@extends('layouts.app')

@section('content')

@include('admin-menu')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Staff Member</title>
</head>
<header>
  <h1>Add Staff Member</h1>
  <div class="header-icons"><a href="{{ route('notification') }}"><i class="fa-regular fa-bell"></i></a>
    <i class="fa-regular fa-user header-icons"></i>
  </div>
</header>
<body>

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="p-4 bg-light border rounded shadow mt-4">
            <form method="POST" action="{{ route('saveStaff') }}">
                @csrf
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" name="first_name" placeholder="First name">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="last_name" placeholder="Last name">
                    </div>
                </div>

                <div class="row">
                    <div class="col mt-4">
                        <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>
                </div>

                <div class="row">
                    <div class="col mt-4">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col mt-4">
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col mt-4">
                        <div class="form-group" id="role">
                            <label for="role">Role</label>
                            <select class="form-control" name="role" id="role" required>
                                <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                                <option value="Inventory Manager" {{ old('role') == 'Inventory Manager' ? 'selected' : '' }}>Inventory Manager</option>
                                <option value="Role_3" {{ old('role') == 'Role_3' ? 'selected' : '' }}>Role 3</option>
                                <option value="Role_4" {{ old('role') == 'Role_4' ? 'selected' : '' }}>Role 4</option>
                                <option value="Role_5" {{ old('role') == 'Role_5' ? 'selected' : '' }}>Role 5</option>
                            </select>
                        </div>
                    </div>

                    <div class="col mt-4">
                        <div class="form-group" id="branch">
                            <label for="branch">Branch</label>
                            <select class="form-control" name="branch" id="branch" required>
                                <option value="Sheffield" {{ old('branch') == 'Sheffield' ? 'selected' : '' }}>Sheffield</option>
                                <option value="Derby" {{ old('branch') == 'Derby' ? 'selected' : '' }}>Derby</option>
                                <option value="Leeds" {{ old('branch') == 'Leeds' ? 'selected' : '' }}>Leeds</option>
                                <option value="Manchester" {{ old('branch') == 'Manchester' ? 'selected' : '' }}>Manchester</option>
                                <option value="5" {{ old('branch') == 5 ? 'selected' : '' }}>Branch 5</option>
                            </select>
                        </div>
                    </div>
                </div>


                <button class="btn btn-primary btn-size mt-4" type="submit">Create Account</button>
            </form>
        </div>
    </div>

</body>
</html>

@endsection
