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
  <h1>Add Staff Member</h1>
  <div class="header-icons">
    <i class="fa-regular fa-bell"></i>
    <i class="fa-regular fa-user"></i>
  </div>

</header>
<body>


    <div class="container">
        <div class="p-4 bg-light border rounded shadow mt-4 ">
        <form>
            <div class="row">
                <div class="col">
                        <input type="text" class="form-control" placeholder="First name">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Last name">
                    </div>
                </div>
                <div class="row">
                    <div class="col mt-4">
                        <input type="text" class="form-control" placeholder="Email">
                    </div>
                </div>

                <div class="row">
                    <div class="col mt-4">
                        <input type="Password" class="form-control" placeholder="Password">
                    </div>
                </div>

                <div class="row">
                    <div class="col mt-4">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Role</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                    </div>
                    <div class="col mt-4">
                        <div class="form-group">
                            <label for="exampleFormControlSelect2">Branch</label>
                            <select class="form-control" id="exampleFormControlSelect2">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                    </div>
                </div>

                <button class="btn btn-primary btn-size " type="submit">Create Account</button>
            </div>

         </form>
  </div>



</body>
</html>

@endsection