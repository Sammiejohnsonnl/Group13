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
  <h1>Admin Dashboard</h1>
  <div class="header-icons"><a href="{{ route('notification') }}"><i class="fa-regular fa-bell"></i></a>
    <i class="fa-regular fa-user header-icons"></i>
  </div>

</header>
<body>

  <div class="container">
    <div class="p-4 bg-light border rounded shadow ">
        <p>Statistics Overview</p>
    </div>
  </div>

  <div class="container">
    <div class="p-4 bg-light border rounded shadow mt-4 ">
        <p>Recent activity</p>
    </div>
  </div>
</body>
</html>

@endsection
