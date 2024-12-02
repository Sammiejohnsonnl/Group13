@extends('layouts.app')

@section('content')

@include('admin-menu')


<h1>Notifications</h1>


<div class="container">
        <h2>My Notifications</h2>
        <div class="p-4 bg-light border rounded shadow mt-4">
            Example Notifications
            <div class="alert alert-success" role="alert">
            Restock at the Sheffield branch
            </div>
            <div class="alert alert-danger" role="alert">
            No Stock [High Demand]
            </div>
            <div class="alert alert-warning" role="alert">
            Low Stock
            </div>
            <div class="alert alert-info" role="alert">
            Data report requested by manager
            </div>
            
    </div>
</html>

@endsection


