<!-- resources/views/products/edit.blade.php -->
@extends('dash')

@section('title', 'Edit Prouct')

@section('content')
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Edit Product</h2>
        <p>Cover:</p>
                <img src="{{ asset($product->cover) }}" style="max-height:100px; max-width:100px" alt="">
        <form action="{{ route('products.update', $product->id) }}" method="POST"enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
            </div>
            <div class="form-group">
                <label for="quantity">Price</label>
                <input type="number" class="form-control" id="quantity" name="quantity" step="0.01" value="{{ $product->price }}" required>
            </div>
            <div class="form-group">
                <label for="price">Quantity</label>
                <input type="number" class="form-control" id="price" name="price"  value="{{ $product->quantity }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description">{{ $product->description }}</textarea>
            </div>
            <div class="form-group">
                        <label for="image" class="form-label">Cover Image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>
            <div class="form-group">
                <label for="category_ids">Categories</label>
                @foreach($categories as $category)
                <div class="form-check">
                    <input name="categories_ids[]" class="form-check-input" type="checkbox" value="{{$category->id}}" id="flexCheckChecked{{$category->id}}"
                        @if(in_array($category->id, $product->categories->pluck('id')->toArray())) checked @endif>
                    <label class="form-check-label" for="flexCheckChecked{{$category->id}}">
                        {{$category->name}}
                    </label>
                </div>
                @endforeach
            </div>
         <style>
            .form-check-input:checked {
                background-color: #cd7f32;
                border-color: #cd7f32;
            }
        </style>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                </select>
            </div>
        </form>
    </div>
    @endsection
