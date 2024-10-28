@extends('dash')

@section('title', 'Show Category')

@section('content')
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Category Details</h2>
        <div class="card">
            <div class="card-header">{{ $category->name }}</div>
            <div class="card-body">
                <p><strong>ID:</strong> {{ $category->id }}</p>
                <p><strong>Name:</strong> {{ $category->name }}</p>
                <p><strong>Products:</strong>
                    @if($category->products->count() > 0)
                        <ul>
                            @foreach($category->products as $product)
                                <li>{{ $product->name }} (Price: {{ $product->price }})</li>
                            @endforeach
                        </ul>
                    @else
                        <p>No products available for this category.</p>
                    @endif
                </p>

                <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
    @endsection
