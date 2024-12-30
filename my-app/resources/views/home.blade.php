@extends('layouts.app')

@section('content')
    <div class="container">
        <header class="d-flex justify-content-between align-items-center my-4">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo">
            <div>
                <a href="{{ route('shopping-cart') }}" class="btn btn-primary">Shopping Cart</a>
                <a href="{{ route('sign-up') }}" class="btn btn-primary ml-2">Sign Up</a>
            </div>
        </header>

        <section class="mb-5">
            <h2 class="text-center mb-4">Recently Added</h2>
            <div class="row">
                @foreach ($recentProducts as $product)
                    <div class="col-md-2 mb-4 d-flex align-items-stretch">
                        <div class="card">
                            <img src="{{ asset($product->image_path) }}" class="card-img-top img-fluid"
                                alt="{{ $product->name }}">
                            <div class="card-body text-center">
                                <p class="card-text">{{ $product->name }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <section class="mb-5">
            <h2 class="text-center mb-4">Games</h2>
            <div class="row">
                @foreach ($games as $product)
                    <div class="col-md-2 mb-4 d-flex align-items-stretch">
                        <div class="card">
                            <img src="{{ asset($product->image_path) }}" class="card-img-top img-fluid"
                                alt="{{ $product->name }}">
                            <div class="card-body text-center">
                                <p class="card-text">{{ $product->name }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <section class="mb-5">
            <h2 class="text-center mb-4">Accessories</h2>
            <div class="row">
                @foreach ($accessories as $product)
                    <div class="col-md-2 mb-4 d-flex align-items-stretch">
                        <div class="card">
                            <img src="{{ asset($product->image_path) }}" class="card-img-top img-fluid"
                                alt="{{ $product->name }}">
                            <div class="card-body text-center">
                                <p class="card-text">{{ $product->name }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection
