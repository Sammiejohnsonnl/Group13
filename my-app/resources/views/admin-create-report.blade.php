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
  <h1>Report</h1>
    <div class="header-icons"><a href="{{ route('admin.viewInventory') }}"><i class="fa-regular fa-bell"></i></a>
    <i class="fa-regular fa-user header-icons"></i>
  </div>

</header>
<body>


  <div class="container">
        <h3> Statistics </h3>
        <div class="p-4 bg-light border rounded shadow ">
        <div class="text-end">
            <button class="btn btn-primary" onclick="exportData()">Generate Report</button>
        </div>
  </div>

</body>
</html>

@endsection
