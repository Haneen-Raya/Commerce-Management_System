@extends('dash')

@section('title', 'Create Product')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4" style="color: #6f4c3e;">Create New Product</h1>
    <div class="col-md-8 mx-auto bg-light p-4 rounded shadow">
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name" style="color: #6f4c3e;">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="price" style="color: #6f4c3e;">Price</label>
                <input type="text" class="form-control" id="price" name="price" required>
            </div>
            <div class="form-group">
                <label for="quantity" style="color: #6f4c3e;">Quantity</label>
                <input type="text" class="form-control" id="quantity" name="quantity" required>
            </div>
            <div class="form-group">
                <label for="description" style="color: #6f4c3e;">Description</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput3" class="mb-2">Upload Image</label>
                <input type="file" name="image" class="form-control" id="exampleFormControlInput3">
            </div>
            <div class="form-group">
                <label for="categories" style="color: #6f4c3e;">Category:</label>
                @foreach($categories as $category)
                    <div class="form-check">
                        <input name="categories_ids[]" class="form-check-input custom-checkbox" type="checkbox" value="{{ $category->id }}" id="category{{ $category->id }}">
                        <label class="form-check-label" for="category{{ $category->id }}">
                            {{ $category->name }}
                        </label>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-between mt-3">
                <button type="submit" class="btn btn-secondary">Create Product</button>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
            </div>
        </form>
    </div>
</div>
@endsection
