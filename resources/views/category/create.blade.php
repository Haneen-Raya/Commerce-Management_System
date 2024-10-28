<!-- resources/views/categories/create.blade.php -->
@extends('dash')

@section('title', 'Create Category')

@section('content')
<div class="container mt-5 form-container">
    <h2 class="mb-4">Create Category</h2>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-bronze">Create</button>
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
</div>
@endsection
