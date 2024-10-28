@extends('dash')

@section('title', 'Edit Category')

@section('content')
    <style>
        .btn-bronze {
            background-color: #cd7f32;
            color: white;
        }
        .form-container {
            max-width: 600px; /* تقليل حجم النموذج */
        }
    </style>
</head>
<body>
    <div class="container mt-5 form-container">
        <h2 class="mb-4">Edit Category</h2>
        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-bronze">Update</button>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
            </div>
        </form>
    </div>
    @endsection
