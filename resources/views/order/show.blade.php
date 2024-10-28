@extends('dash')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4" style="color: #6c757d;">Order Details</h1>

    <div class="card" style="background-color: #f8f9fa; border: 1px solid #dee2e6;">
        <div class="card-body">
            <p><strong style="color: #495057;">Product:</strong> {{ $order->product->name }}</p>
            <p><strong style="color: #495057;">Customer:</strong> {{ $order->user->name }}</p>
            <p><strong style="color: #495057;">Price:</strong> {{ $order->product->price }}$</p>
            <p><strong style="color: #495057;">Status:</strong>
                <span class="badge badge-{{ $order->status == 'Completed' ? 'success' : 'warning' }}">
                    {{ $order->status }}
                </span>
            </p>

        </div>
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('orders.index') }}" class="btn btn-primary">Back to Orders</a>
    </div>
</div>

<style>
.card {
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.btn-primary {
    background-color: #6c757d; /* لون هادئ */
    border-color: #6c757d;
}

.btn-primary:hover {
    background-color: #5a6268; /* لون داكن عند التحويم */
}
</style>

@endsection
