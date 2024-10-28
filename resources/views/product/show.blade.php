@extends('dash')

@section('title', 'Show Prouct')

@section('content')
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Product Details</h2>
        <div class="card">
            <div class="card-header">{{ $products->name }}</div>
            <div class="card-body">
                <p><strong>Price:</strong> {{ $products->price }}</p>
                <p><strong>Description:</strong> {{ $products->description }}</p>
                <p><strong>Quantity:</strong>{{ $products->quantity }}</p>
                <p><strong>Categories:</strong>
                @foreach($products->categories as $category)
                    <span class="badge badge-secondary">{{ $category->name }}</span>
                @endforeach
                <p>Cover:</p>
                    <img src="{{ asset($products->cover) }}" class="img-fluid mb-2" style="max-height:100px; max-width:100px" alt="">
                </p>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
    @endsection
