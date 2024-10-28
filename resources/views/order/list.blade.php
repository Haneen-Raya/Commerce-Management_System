@extends('dash')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4" style="color: #6c757d;">Orders</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="text-right mb-3">

    </div>

    <div class="table-responsive">
        <table class="table table-bordered" style="background-color: #f8f9fa;">
            <thead style="background-color: #e2e3e5;">
                <tr>
                    <th>Product</th>
                    <th>Customer Name</th>
                    <th>Status</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->product->name }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>
                        <span class="badge badge-{{ $order->status == 'Completed' ? 'success' : 'warning' }}">
                            {{ $order->status }}
                        </span>
                    </td>
                    <td>{{ $order->product->price }}$</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
                            </form>
                            <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info btn-sm">View</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<style>
.table {
    border-collapse: collapse;
    width: 100%;
}

.table th, .table td {
    padding: 12px;
    text-align: left;
}

.table th {
    color: #495057;
}

.table tr:hover {
    background-color: #f1f1f1;
}

.btn-group {
    display: flex;
    gap: 5px; /* المسافة بين الأزرار */
}

.btn-primary {
    background-color: #6c757d; /* لون هادئ */
    border-color: #6c757d;
}

.btn-primary:hover {
    background-color: #5a6268; /* لون داكن عند التحويم */
}

.alert {
    background-color: #fff3cd; /* لون خلفية التنبيه */
    color: #856404; /* لون نص التنبيه */
}
</style>

@endsection
