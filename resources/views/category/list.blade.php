<!-- resources/views/categories/index.blade.php -->
@extends('dash')

@section('title', 'List Category')

@section('content')
    <style>
        .btn-bronze {
            background-color: #cd7f32;
            color: white;
        }
        .btn-bronze:hover {
            background-color: #a3672a;
            color: white;
        }
        .btn-info {
            background-color: #28a745; /* لون العرض أخضر */
            color: white;
        }
        .btn-info:hover {
            background-color: #218838; /* لون العرض عند الهوفر */
            color: white;
        }
        .btn-danger {
            background-color: #dc3545; /* لون الحذف أحمر */
            color: white;
        }
        .btn-danger:hover {
            background-color: #c82333; /* لون الحذف عند الهوفر */
            color: white;
        }
    </style>
    <div class="container mt-5">
        <h2 class="mb-4">Categories</h2>
        <a href="{{ route('categories.create') }}" class="btn btn-bronze mb-3">Add New Category</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-bronze">Edit</a>
                            <a href="{{ route('categories.show', $category->id) }}" class="btn btn-info">Show</a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
