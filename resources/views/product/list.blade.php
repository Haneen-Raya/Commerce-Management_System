@extends('dash')

@section('title', 'List Products')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4" style="color: #6c757d;">Products</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="text-right mb-3">
        <a href="{{ route('products.create') }}" class="btn btn-secondary">Add New Product</a>
    </div>
    @if(!isset($search))
    @if(!$hasFilter)
    <form action="{{ route('products.index') }}" method="GET" class="mb-4">
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <input type="text" name="name" class="form-control" placeholder="Product Name" value="{{ request('name') }}">
            </div>
            <div class="col-md-4 mb-3">
                <input type="number" name="price_min" class="form-control" placeholder="Min Price" value="{{ request('price_min') }}">
            </div>
            <div class="col-md-4 mb-3">
                <input type="number" name="price_max" class="form-control" placeholder="Max Price" value="{{ request('price_max') }}">
            </div>
            <div class="col-md-4 mb-3">
                <select name="category_id" class="form-control">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <button class="btn btn-outline-secondary" type="submit">Filter</button>
            </div>
        </div>
    </form>

    <!-- نموذج البحث -->
    <form action="{{ route('products.search') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search products..." value="{{ request('search') }}">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </div>
    </form>
    @else
    <div class="text-right mb-3">
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Clear Filter</a>
    </div>
    @endif
    @endif

    <h2>Product List</h2>
    @if(isset($search) && $products->isEmpty())
        <p>No products found.</p>
    @endif
    <table class="table table-striped table-hover">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Image</th>
                <th>Categories</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($products) && !$products->isEmpty())
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}$</td>
                    <td>{{ Str::limit($product->description, 50) }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td><img src="{{ $product->cover }}" class="img-responsive" style="max-height:100px; max-width:100px" alt=""></td>
                    <td>
                        @foreach($product->categories as $category)
                            <span class="badge badge-secondary">{{ $category->name }}</span>
                        @endforeach
                    </td>
                    <td>
                    @if(!$product->deleted_at)
                    <a href="{{route('products.edit', $product->id) }}" class="btn btn-edit">Update</a>
                    <a href="{{route('products.show', $product->id) }}" class="btn btn-edit">Show</a>
                        <form action="{{route('products.destroy', $product->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete">Delete</button>
                        </form>
                    </td>
                </tr>
                @else
                <form action="{{ route('products.restore', $product) }}" method="post" class="d-inline">
                                @csrf
                                @method('PUT')
                            <button type="submit" class="btn btn-outline-danger">Restore</button>
                        </form>
                            @endif
                            @if ($product->trashed())
                        <form action="{{ route('products.forceDelete', $product->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Final Deletion</button>
                    </form>
                @endif
                @endforeach
            @else
                <tr>
                    <td colspan="8" class="text-center">No products available.</td>
                </tr>
            @endif
        </tbody>
    </table>

    @if(isset($search) && $search !== '')
        <div class="text-right mb-3">
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Clear Filter</a>
        </div>
    @endif
</div>
@endsection
